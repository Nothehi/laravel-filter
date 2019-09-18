<?php

namespace HChamran\LaravelFilter\Contracts;

use Illuminate\Http\Request;

abstract class QueryFilter implements FilterInterface
{
    protected $request;

    protected $fields;

    protected $sort;

    protected $filters;

    protected $builder;

    public function __construct()
    {
        $this->fields = $this->fields();

        $this->request = Request::capture();

        $this->requestParser($this->getRequests());
    }

    public function builder($query)
    {
        dd($query);
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
     * @param $values
     * @return void
     */
    public function setFieldsExists($values)
    {
        $current = 0;
        foreach ($values as $value) {
            if($this->fieldExist($value[0]))
                $current++;
            else {
                unset($values[$current]);
                $current++;
            }
        }

        $this->filters = $values;
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
}
