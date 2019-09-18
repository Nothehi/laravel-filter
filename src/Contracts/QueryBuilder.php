<?php


namespace HChamran\LaravelFilter\Contracts;


use Illuminate\Http\Request;

abstract class QueryBuilder implements FilterInterface
{
    protected $request;

    protected $target;

    protected $sort;


    protected $fields;

    public function __construct()
    {
        $this->fields = $this->fields();

        $this->request = Request::capture();

        list($this->target, $this->sort) = $this->requestParser($this->getRequests());
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
     * @return array|void
     */
    private function requestParser($request)
    {
        if (empty($request))
            return;

        $options = explode(',', $query);
        return $options;
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