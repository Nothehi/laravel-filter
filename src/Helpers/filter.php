<?php

if (! function_exists('getInstanceFilter')) {
    /**
     * Get the available filter instance.
     *
     * @param null $class
     * @return mixed
     */
    function getInstanceFilter($class = null)
    {
        $filters = config('filter.filters');

        if (class_exists($filters[$class])) {
            return new $filters[$class];
        }
    }
}

if (! function_exists('filter')) {
    /**
     * Make the filter querty string.
     *
     * @param $field
     * @param $value
     * @return String
     */
    function filter($field, $value)
    {
        return "?{$field}:{$value}";
    }
}
