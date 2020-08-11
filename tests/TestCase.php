<?php

namespace Beyonddigitalit\ViesVatValidation\Tests;

use Beyonddigitalit\ViesVatValidation\ViesVatValidationServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Package provider.
     * @author Bharatwaj Sriram <beyonddigitalit@gmail.com>
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            ViesVatValidationServiceProvider::class,
        ];
    }
}