# VIES Vat Number Validation - Laravel

Vat Information Exchange System (VIES), is an electronic mean of validating VAT-identification numbers of economic operators registered in the European Union for cross border transactions on goods or services.

## Installation

Require this package with composer.

```bash
composer require beyonddigitalit/vies-vat-validation
```

## Usage

```php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Facades\Beyonddigitalit\ViesVatValidation\ViesVatValidator;

    class ValidationController extends Controller
    {
        try {
            $response = ViesVatValidator::validate("GB844281425");
        } catch (\Exception) {
            // Handle exception here.
        }
    }

```

## Usage for testing

Please use this method for testing. See below table for valid and invalid
Vat numbers to use for testing. Remember these Vat Numbers will only
work with the test endpoint as seen in the below example.

```php

use Beyonddigitalit\ViesVatValidation\ViesVatValidator;

$vatValidator = new ViesVatValidator(
    'https://ec.europa.eu/taxation_customs/vies/checkVatTestService.wsdl'
);

$response = $vatValidator->validate("GB100");

```

Vat Number | Response
-------- | --------
100 | Valid request with Valid VAT Number 
200 | Valid request with an Invalid VAT Number 
201 | Error : INVALID_INPUT 
202 | Error : INVALID_REQUESTER_INFO 
300 | Error : SERVICE_UNAVAILABLE 
301 | Error : MS_UNAVAILABLE 
302 | Error : TIMEOUT 
400 | Error : VAT_BLOCKED 
401 | Error : IP_BLOCKED 
500 | Error : GLOBAL_MAX_CONCURRENT_REQ 
501 | Error : GLOBAL_MAX_CONCURRENT_REQ_TIME 
600 | Error : MS_MAX_CONCURRENT_REQ 
601 | Error : MS_MAX_CONCURRENT_REQ_TIME For all the other cases, The web service will responds with a "SERVICE_UNAVAILABLE" error

## Response Object

The response will be a  ``` ViesValidatorResponse ``` you can then call the
below methods to access the data.

```php

$response = ViesVatValidator::validate("GB844281425");

$response->isValid(); // boolean value
$response->getCountryCode(); // GB
$response->getVatNumber(); // B844281425
$response->getRequestDate(); // Carbon instance, date
$response->getName(); // name of the registered entity
$response->getAddress(); // address of the registered entity

```

## Tests

```bash
vendor/bin/phpunit 
```

## Contributing
Pull requests are welcome.

## License
[MIT](https://choosealicense.com/licenses/mit/)