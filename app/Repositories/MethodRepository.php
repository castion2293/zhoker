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
        return $this->method->find($id);
     }

     /**
     * @param $method_name
     * @return method
     */
     public function findMethodByMethodName($method_name = null)
     {
        return $this->method->findMethod($method_name);
     }

    /**
     * @param Method $method
     * @param null $qty
     * @return \Illuminate\Database\Eloquent\Collection
     */
     public function forMeals(Method $method, $qty = null)
     {
         if ($qty) {
             return $method->meals()->take($qty)->get();
         } else {
             return $method->meals()->get();
         }
     }
}