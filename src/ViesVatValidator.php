<?php

namespace Beyonddigitalit\ViesVatValidation;

use Beyonddigitalit\ViesVatValidation\Client;

class ViesVatValidator
{
    protected $viesClient;

    /**
     * Validate a give vat number against VIES Vat validation service
     * @author Bharatwaj Sriram <Beyonddigitalit@gmail.com>
     * @param  String $vatNumber
     * @return [type]
     */
    public function validate($vatNumber)
    {
        if ($this->viesClient === null) {
            $this->viesClient = new ViesClient;
        }

        return $this->viesClient->checkVat('GB', '844281425');
    }

    /**
     * Split the vatnumber into 2 parts, the first part is the countryCode and
     * the second part is the vatNumber.
     * @author Bharatwaj Sriram <Beyonddigitalit@gmail.com>
     * @param  String $vatNumber
     * @return Array
     */
    protected function splitVatNumber($vatNumber): Array
    {
        preg_match('/([A-Za-z]{2})(.*)/', $vatNumber, $matches);

        return [
            'countryCode' => $matches[1],
            'vatNumber' => $matches[2],
        ];
    }
}