<?php

namespace App\Repositories\Foundation\OrderFilter;

class ChefOrderTypeAll extends AbstractChefOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->withTrashed()->latest('id')->with('carts');
    }
}