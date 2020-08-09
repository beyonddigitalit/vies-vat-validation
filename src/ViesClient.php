<?php

namespace Beyonddigitalit\ViesVatValidation;

use SoapFault;
use SoapClient;
use Beyonddigitalit\ViesVatValidation\Exceptions\ViesVatValidatorException;

/**
 * A client for the VIES SOAP web service
 */
class ViesClient
{
    /**
     * URL to WSDL
     *
     * @var string
     */
    private $wsdl = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';

    /**
     * SOAP client
     *
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * SOAP classmap
     *
     * @var array
     */
    private $classmap = [
        'checkVatResponse' => 'Beyonddigitalit\ViesVatValidation\Responses\ViesValidatorResponse'
    ];

    /**
     * Constructor
     *
     * @param string|null $wsdl URL to WSDL
     */
    public function __construct($wsdl = null)
    {
        if ($wsdl) {
            $this->wsdl = $wsdl;
        }
    }

    /**
     * Check VAT
     *
     * @param string $countryCode Country code
     * @param string $vatNumber   VAT number
     *
     * @return Response\CheckVatResponse
     * @throws ViesException
     */
    public function checkVat($countryCode, $vatNumber)
    {
        try {
            return $this->getSoapClient()->checkVat(
                [
                    'countryCode' => $countryCode,
                    'vatNumber' => $vatNumber
                ]
            );
        } catch (SoapFault $e) {
            throw new ViesVatValidatorException(
                'Error communicating with VIES service', 0, $e
            );
        }
    }

    /**
     * Get SOAP client
     *
     * @return \SoapClient
     */
    private function getSoapClient()
    {
        if ($this->soapClient === null) {
            $this->soapClient = new SoapClient(
                $this->wsdl,
                array(
                    'classmap' => $this->classmap,
                    'user_agent' => 'Mozilla',
                    'exceptions' => true,
                )
            );
        }

        return $this->soapClient;
    }
}