<?php

namespace Beyonddigitalit\ViesVatValidation;

use Beyonddigitalit\ViesVatValidation\ViesVatValidator;
use Illuminate\Support\ServiceProvider;

class ViesVatValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
    }

    public function register()
    {
        $this->app->singleton(ViesVatValidator::class, function() {
            return new ViesVatValidator;
        });
    }
}