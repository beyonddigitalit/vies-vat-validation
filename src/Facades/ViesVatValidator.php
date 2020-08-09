<?php

namespace Beyonddigitalit\ViesVatValidation\Facades;

use Illuminate\Support\Facades\Facade;

class ViesVatValidator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ViesVatValidator';
    }
}