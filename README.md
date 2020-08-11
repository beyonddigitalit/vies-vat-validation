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
Pull requests are welcome. please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)