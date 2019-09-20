# Easily filter and search
[![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/hchamran/laravel-filter?style=flat-square)](https://scrutinizer-ci.com/g/hChamran/laravel-filter)
[![Scrutinizer build (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/build/g/hchamran/laravel-filter?color=green&style=flat-square)](https://scrutinizer-ci.com/g/hChamran/laravel-filter)
[![Packagist Version](https://img.shields.io/packagist/v/hchamran/laravel-filter?color=yellowgreen&style=flat-square)](https://packagist.org/packages/hchamran/laravel-filter)

## Installation
```
composer require hchamran/laravel-filter
```

Next, you must add provider to `config/app.php` :

```php
HChamran\LaravelFilter\Providers\FilterServiceProvider::class,
```

And for make filter first use filterable in your model:

```php
use Filterable;
```

Seccond make filter class with this command Example: 

```
php artisan make:filter UserFilter
```
