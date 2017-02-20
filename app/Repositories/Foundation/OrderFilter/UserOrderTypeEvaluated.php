<?php

namespace App\Repositories\Foundation\OrderFilter;

class UserOrderTypeEvaluated extends AbstractUserOrderType
{
    public function getQueryBuilder($builder)
    {
        return $builder->where(function ($query) use ($builder) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($builder->get() as $userOrder) {
                        foreach ($userOrder->carts as $cart) {
                            if ($cart->cheforders()->first()->checked && $cart->evaluated && $this->overTime($cart)) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
    }

    protected function makeUserOrderBuilder($query, $user_order_id, $cart_id)
    {
        return $query->whereIn('id', array_unique($user_order_id))
                      ->latest('id')
                      ->with(['carts' => function($query) use ($cart_id) {
                            $query->whereIn('id', $cart_id);
                      }]);
    }
}