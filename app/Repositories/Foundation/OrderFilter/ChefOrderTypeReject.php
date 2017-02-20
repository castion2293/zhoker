<?php

namespace App\Repositories\Foundation\OrderFilter;

class ChefOrderTypeReject extends AbstractChefOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->onlyTrashed()->latest('id')->with('carts');
    }
}