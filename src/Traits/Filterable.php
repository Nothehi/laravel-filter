<?php

namespace HChamran\LaravelFilter\Traits;

use HChamran\LaravelFilter\Contracts\QueryFilter;

trait Filterable
{
    /**
     * @param $query
     * @param QueryFilter $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $filter)
    {
        if (is_string($filter))
            return filter($filter)->builder($query);
        elseif ($filter instanceof QueryFilter)
            return $filter->builder($query);
    }
}