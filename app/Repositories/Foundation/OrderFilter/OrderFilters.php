<?php

namespace App\Repositories\Foundation\OrderFilter;

use App\Repositories\Foundation\QueryFilter;

class OrderFilters extends QueryFilter
{
    public function chefOrderType($type = 'All')
    {
        $this->builder = ChefOrderTypeFactory::create($type)->getQueryBuilder($this->builder);
    }

    public function userOrderType($type = 'all')
    {
        $this->builder = UserOrderTypeFactory::create($type)->getQueryBuilder($this->builder);
        
    }
}