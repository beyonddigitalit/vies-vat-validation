<?php

namespace Beyonddigitalit\ViesVatValidation\Tests;

use Facades\Beyonddigitalit\ViesVatValidation\ViesVatValidator;
use Beyonddigitalit\ViesVatValidation\Tests\TestCase;

class VatValidationTest extends TestCase
{
    /** @test */
    public function it_checks_if_a_vat_number_is_valid()
    {
        $response = ViesVatValidator::validate('GB844281425');

        $this->assertTrue($response->isValid());
    }

    /** @test */
    public function it_checks_if_a_vat_number_is_not_valid()
    {
        $response = ViesVatValidator::validate('GB844281425234');

        $this->assertFalse($response->isValid());
    }
}