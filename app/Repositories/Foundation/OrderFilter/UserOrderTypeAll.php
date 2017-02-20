<?php

namespace App\Repositories\Foundation\OrderFilter;

class UserOrderTypeAll extends AbstractUserOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->latest('id')->with('carts');
    }
}