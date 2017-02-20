<?php

namespace App\Repositories\Foundation\OrderFilter;

class ChefOrderTypeCancel extends AbstractChefOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->where(function ($query) use ($builder) {
                    $chef_order_id = [];
                    foreach ($builder->get() as $chefOrder) {
                        if ($cart = $chefOrder->carts()->onlyTrashed()->first())
                            $chef_order_id = array_prepend($chef_order_id, $cart->chef_order_id);
                    }
                    $query->whereIn('id', $chef_order_id)->latest('id')->with('carts');
                });
    }
}