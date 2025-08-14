# GoShip SDK for Laravel framework (Only Vietnam Support)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tringuyenduc2903/goshipvietnam-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/goshipvietnam-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/goshipvietnam-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tringuyenduc2903/goshipvietnam-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/goshipvietnam-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tringuyenduc2903/goshipvietnam-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tringuyenduc2903/goshipvietnam-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/goshipvietnam-laravel)

## Installation

You can install the package via composer:

```bash
composer require tringuyenduc2903/goshipvietnam-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="goshipvietnam-laravel-config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('GOSHIP_API_URL', 'https://sandbox.goship.io'),
    'jwt' => env('GOSHIP_JWT', ''),
];
```

## Usage

```php
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](https://github.com/tringuyenduc2903/GoShipVietNam-Laravel/security/policy) on how to
report security vulnerabilities.

## Credits

- [Tri Nguyen Duc (Bee Tech - PHP)](https://github.com/tringuyenduc2903)
- [All Contributors](https://github.com/tringuyenduc2903/GoShipVietNam-Laravel/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
