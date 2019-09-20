# Easily filter and search

### Installation
`
composer require hchamran/laravel-filter
`

Next, you must add provider to `config/app.php` :

`
HChamran\LaravelFilter\Providers\FilterServiceProvider::class,
`

And for make filter first use filterable in your model:

`
use Filterable;
`

Seccond make filter class with this command Example: 

`
php artisan make:filter UserFilter
`
