<?php

namespace Beyonddigitalit\ViesVatValidation\Responses;

use Carbon\Carbon;

class ViesValidatorResponse
{
    private $countryCode;

    private $vatNumber;

    private $requestDate;

    private $valid;

    private $name;

    private $address;

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    public function getRequestDate()
    {
        if (!$this->requestDate instanceof Carbon) {
            $this->requestDate = new Carbon($this->requestDate);
        }

        return $this->requestDate;
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }
}