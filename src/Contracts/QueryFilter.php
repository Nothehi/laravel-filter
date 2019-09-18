<?php

namespace HChamran\LaravelFilter\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter implements FilterInterface
{
    protected $request;

    protected $fields;

    protected $sort;

    protected $filters;

    protected $builder;

    protected $chars = ['-'];

    public function __construct()
    {
        $this->fields = $this->fields();

        $this->request = Request::capture();

        $this->requestParser($this->getRequests());
    }

    public function builder(Builder $query)
    {
        dd($this->filters, $this->sort);
    }

    /**
     * Get all requests
     *
     * @return array
     */
    protected function getRequests()
    {
        return $this->request->all();
    }

    /**
     * Parse get url string
     *
     * @param $request
     * @return void
     */
    private function requestParser($request)
    {
        if (empty($request))
            return;

        list($filterString, $this->sort) = explode(',', array_keys($request)[0]);

        $conditions = explode('|', $filterString);

        $filters = $this->getFilters($conditions);

        $this->setFieldsExists($filters);
    }

    /**
     * Return value of get string request
     *
     * @param $conditions
     * @return mixed
     */
    private function getFilters($conditions)
    {
        foreach ($conditions as $filter) {
            $this->filters[] = explode(':', $filter);
        }

        return $this->filters;
    }

    /**
     * This function returned just values which exists in fields property
     *
     * @param $filters
     * @return void
     */
    public function setFieldsExists($filters)
    {
        $current = 0;
        foreach ($filters as $filter) {
            if ($this->fieldExist($filter[0])) {
                if ($this->charExist($filter[1], '-')) {
                    $filters[$current][1] = explode('-', $filter[1]);
                }
                $current++;
            }
            else {
                unset($filters[$current]);
                $current++;
            }
        }
        $this->filters = $filters;
    }

    /**
     * Return if field exist in fields property
     *
     * @param $filed
     * @return bool
     */
    private function fieldExist($filed)
    {
        return in_array($filed, $this->fields);
    }

    /**
     * Check if needle in field exist
     *
     * @param $field
     * @param $needle
     * @return bool
     */
    private function charExist($field, $needle)
    {
        foreach ($this->chars as $char) {
            if ($needle == $char && strpos($field, $char)) {
                return true;
            }
        }

        return false;
    }
}
