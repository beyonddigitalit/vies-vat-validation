<?php

namespace Beyonddigitalit\ViesVatValidation\Responses;

use Carbon\Carbon;

class ViesValidatorResponse
{
    /**
     * Country code
     * @var string
     */
    private $countryCode;

    /**
     * Vat number
     * @var string
     */
    private $vatNumber;

    /**
     * Request date
     * @var \Carbon\Carbon
     */
    private $requestDate;

    /**
     * Is valid flag
     * @var boolean
     */
    private $valid;

    /**
     * Name of entity
     * @var string
     */
    private $name;

    /**
     * Entity address
     * @var string
     */
    private $address;

    /**
     * Get the country code from the response
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Get vat number from response
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return string
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    /**
     * Get requested date from the response
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return \Carbon\Carbon
     */
    public function getRequestDate(): Carbon
    {
        if (!$this->requestDate instanceof Carbon) {
            $this->requestDate = new Carbon($this->requestDate);
        }

        return $this->requestDate;
    }

    /**
     * Get the isValid flag form the response
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return boolean
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * Get the name of the registered entity from the response
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the address of the registered entity from the response
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}