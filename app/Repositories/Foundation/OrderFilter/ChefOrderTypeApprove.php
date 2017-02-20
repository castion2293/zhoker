<?php

namespace App\Repositories\Foundation\OrderFilter;

class ChefOrderTypeApprove extends AbstractChefOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->where('checked', true)->latest('id')->with('carts');
    }
}