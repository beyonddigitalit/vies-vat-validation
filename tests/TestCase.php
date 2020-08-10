<?php

namespace Beyonddigitalit\ViesVatValidation\Tests;

use Beyonddigitalit\ViesVatValidation\ViesVatValidationServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Package provider.
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ViesVatValidationServiceProvider::class,
        ];
    }
}