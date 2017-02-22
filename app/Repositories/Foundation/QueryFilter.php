<?php

namespace App\Repositories\Foundation;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Repositories\Foundation\DateTrait;

abstract class QueryFilter
{
    use DateTrait;

    protected $request;
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        
        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }
        
        return $this->builder;
    }

    /**
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }
}