<?php

if (! function_exists('filter')) {
    /**
     * Get the available container instance.
     *
     * @param null $class
     * @return mixed
     */
    function filter($class = null)
    {
        $filter_class = 'App\Filters\\' . $class;
        if (class_exists($filter_class)) {
            return new $filter_class();
        }
    }
}