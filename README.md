# Easily filter and search  

<p align="center">
    <img width="250px" src="https://user-images.githubusercontent.com/43233476/65450848-eb693e80-de4a-11e9-9871-494bfb328717.png"></img>
</p>

[![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/hchamran/laravel-filter?style=flat-square)](https://scrutinizer-ci.com/g/hChamran/laravel-filter)
[![Scrutinizer build (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/build/g/hchamran/laravel-filter?color=green&style=flat-square)](https://scrutinizer-ci.com/g/hChamran/laravel-filter)
[![Packagist Version](https://img.shields.io/packagist/v/hchamran/laravel-filter?color=yellowgreen&style=flat-square)](https://packagist.org/packages/hchamran/laravel-filter)
[![GitHub](https://img.shields.io/github/license/hchamran/laravel-filter?color=yellow&style=flat-square)](https://github.com/hChamran/laravel-filter/blob/master/LICENSE)

## Topics
 - [Introduction](https://github.com/hChamran/laravel-filter#introduction)
 - [Concept](https://github.com/hChamran/laravel-filter#concept)
 - [Installation](https://github.com/hChamran/laravel-filter#installation)
 - [Usage](https://github.com/hChamran/laravel-filter#usage)

## Introduction
Always in laravel, the filter of database fields and search inside that, it's repetitive work, but you can with use this package create filters very easy.

## Concept
This work with GET method and query string. When this receives query string, parses this query string to this characters:

Symbol | Do | Usage | Example
:---|:---|:---|:---|
\: | separating field from value | Field:value | title:phone 
\- | separating range of values | value1-value2 | price:0-100
\, | separating fields fo filter from sort method | Field:value,sort | title:phone,asc
By | separating field of sorting from sort method | Field:value,sortByField | title:phone,ascByprice
  
## Installation  
```  
composer require hchamran/laravel-filter  
```  
  
(For Laravel <=5.4) Next, you must add the service provider to config/app.php `config/app.php` :  
```php  
'providers' => [  
    // for laravel 5.4 and below  
    HChamran\LaravelFilter\Providers\FilterServiceProvider::class,  
]  
```  
  
Publish your config file  
```  
php artisan vendor:publish  
```  

## Usage
  
First use filterable in your model:  
```php  
use Filterable;  
```  
  
Second make filter class with this command for Example:   
```  
php artisan make:filter UserFilter  
```
Third, add fields which you want to search inside it for example for products:
```php
public function fields()  
{  
  return [  
  'title', 'excerpt', 'price'  
  ];  
}
```
And in final just do search with helper:
```php
filter(thisIsField, thisIsValue)
```
```html
<a href="{{ filter('price', '0-50') }}">Low Price</a>
```
