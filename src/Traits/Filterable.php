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
    public function scopeFilter($query, QueryFilter $filter)
    {
        return $filter->dispatch($query);
    }
}