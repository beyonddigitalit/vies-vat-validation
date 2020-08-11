<?php

namespace Beyonddigitalit\ViesVatValidation\Facades;

use Illuminate\Support\Facades\Facade;

class ViesVatValidator extends Facade
{
    /**
     * Get the registered name of the component.
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ViesVatValidator';
    }
}