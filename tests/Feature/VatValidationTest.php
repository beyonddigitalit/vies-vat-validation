<?php

namespace Beyonddigitalit\ViesVatValidation\Tests;

use Facades\Beyonddigitalit\ViesVatValidation\ViesVatValidator;
use Illuminate\Support\Collection;
use Orchestra\Testbench\TestCase;

class VatValidationTest extends TestCase
{
    /** @test */
    public function it_checks_if_a_vat_number_is_valid()
    {
        $response = ViesVatValidator::validate('GB100');
        
        $this->assertTrue($response->isValid());
    }
}