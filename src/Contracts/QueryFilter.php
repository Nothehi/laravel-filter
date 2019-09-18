<?php

namespace HChamran\LaravelFilter\Contracts;

use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter extends QueryBuilder
{
    /**
     * @param Builder $builder
     * @return Builder|void
     */
    public function dispatch(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->getRequest() as $field => $options) {
            
            if(!method_exists($this, $field)){
                return ;
            }

            (!empty($options)) ? $this->{$field}($options) : $this->{$field}();
        }

        return $builder;
    }
}