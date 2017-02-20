<?php

namespace App\Repositories\Foundation\OrderFilter;

class ChefOrderTypePending extends AbstractChefOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->where(function ($query) use ($builder) {
                    $chef_order_id = [];
                    foreach ($builder->get() as $chefOrder) {
                        if (!$this->overTime($cart = $chefOrder->carts()->first()))
                            $chef_order_id = array_prepend($chef_order_id, $cart->chef_order_id);
                    }
                    $query->where('checked', false)->whereIn('id', $chef_order_id)->latest('id')->with('carts');
                });
    }
}