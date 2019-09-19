<?php

if (! function_exists('filter')) {
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