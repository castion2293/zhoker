<?php

namespace App\Repositories;

use App\Method;

class MethodRepository
{
    protected $method;

    /**
     * MethodRepository constructor.
     * @param Method $method
     */
    public function __construct(Method $method)
    {
        $this->method = $method;
    }

    /**
     * @param $id
     * @return method
     */
     public function findMethodById($id)
     {
        return $this->method->finOrFail($id);
     }

     /**
     * @param null
     * @return method
     */
     public function findMethodAll()
     {
        return $this->method->all();
     }
}