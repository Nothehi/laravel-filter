<?php

namespace HChamran\LaravelFilter\Facades;

use Illuminate\Support\Facades\Facade;

class Filter extends Facade
{
    public static function getFacadeAccessor()
    {
        return \HChamran\LaravelFilter\Filter::class;
    }
}