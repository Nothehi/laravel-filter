<?php


namespace HChamran\LaravelFilter\Contracts;


interface FilterInterface
{
    public function fields();

    public function handle($query);
}