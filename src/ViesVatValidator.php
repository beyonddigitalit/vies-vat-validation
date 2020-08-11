<?php

namespace Beyonddigitalit\ViesVatValidation;

use Beyonddigitalit\ViesVatValidation\Exceptions\ViesException;
use Beyonddigitalit\ViesVatValidation\Responses\ViesValidatorResponse;

class ViesVatValidator
{
    /**
     * WSDL service endpoint
     * @var string
     */
    protected $wsdl;

    /**
     * Vies Validator constructor
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     */
    public function __construct($wsdl = null)
    {
        $this->wsdl = $wsdl ?: 'https://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';
    }

    /**
     * Validate a given vat number against VIES validation service
     * @author Bharatwaj Sriram <Beyonddigitalit@gmail.com>
     * @param  string $vatNumber
     */
    public function validate($vatNumber = null): ViesValidatorResponse
    {
        try {

            $client = new \SoapClient($this->wsdl, [
                'classmap' => [
                    'checkVatResponse' => ViesValidatorResponse::class
                ],
                'trace' => 1,
                'exceptions' => true,
            ]);

        } catch(\SoapFault $ex) {
            throw new ViesException('VIES Connection Error', 0, $ex);
        }

        $params = $this->splitVatNumber($vatNumber);

        return $client->checkVat($params);
    }

    /**
     * Split the vatnumber into 2 parts, the first part is the countryCode and
     * the second part is the vatNumber.
     * @author Bharatwaj Sriram <Beyonddigitalit@gmail.com>
     * @param  string $vatNumber
     */
    protected function splitVatNumber($vatNumber): array
    {
        // Split the string into countrycode and vat number
        preg_match('/([A-Za-z]{2})(.*)/', $vatNumber, $matches);

        return [
            'countryCode' => $matches[1] ?? null,
            'vatNumber' => $matches[2] ?? null,
        ];
    }
}