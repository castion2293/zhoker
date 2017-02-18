<?php

namespace App\Repositories\Foundation;

use App\Repositories\Foundation\DateTrait;

class OrderFilters extends QueryFilter
{
    use DateTrait;

    public function chefOrderType($type = 'all')
    {
        switch($type)
        {
            case 'all':
                $this->builder->withTrashed()->latest('id')->with('carts');
                break;
            case 'approve':
                $this->builder->where('checked', true)->latest('id')->with('carts');
                break;
            case 'reject':
                $this->builder->onlyTrashed()->latest('id')->with('carts');
                break;
            case 'pending':
                $this->builder->where(function ($query) {
                    $chef_order_id = [];
                    foreach ($this->builder->get() as $chefOrder) {
                        if (!$this->overTime($cart = $chefOrder->carts()->first()))
                            $chef_order_id = array_prepend($chef_order_id, $cart->chef_order_id);
                    }
                    $query->where('checked', false)->whereIn('id', $chef_order_id)->latest('id')->with('carts');
                });
                break;
            case 'cancel':
                $this->builder->where(function ($query) {
                    $chef_order_id = [];
                    foreach ($this->builder->get() as $chefOrder) {
                        if ($cart = $chefOrder->carts()->onlyTrashed()->first())
                            $chef_order_id = array_prepend($chef_order_id, $cart->chef_order_id);
                    }
                    $query->whereIn('id', $chef_order_id)->latest('id')->with('carts');
                });
                break;
            case 'overdue':
                $this->builder->where(function ($query) {
                    $chef_order_id = [];
                    foreach ($this->builder->get() as $chefOrder) {
                        if ($this->overTime($cart = $chefOrder->carts()->first()))
                            $chef_order_id = array_prepend($chef_order_id, $cart->chef_order_id);
                    }
                    $query->where('checked', false)->whereIn('id', $chef_order_id)->latest('id')->with('carts');
                });
                break;
            default:
                break;
        }
    }

    public function userOrderType($type = 'all')
    {
         switch($type)
         {
            case 'all':
                $this->builder->latest('id')->with('carts');
                break;
            case 'approve':
                $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts as $cart) {
                            if ($cart->cheforders()->first()->checked) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            case 'reject':
                $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts()->onlyTrashed()->get() as $cart) {
                            if ($cart->cheforders()->onlyTrashed()) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            case 'pending':
                $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts as $cart) {
                            if (!$cart->cheforders()->first()->checked && !$this->overTime($cart)) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            case 'cancel':
                $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts()->onlyTrashed()->get() as $cart) {
                            if ($cart->cheforders()->first()) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            case 'overdue':
                $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts as $cart) {
                            if (!$cart->cheforders()->first()->checked && $this->overTime($cart)) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            case 'evaluation':
                $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts as $cart) {
                            if ($cart->cheforders()->first()->checked && !$cart->evaluated && $this->overTime($cart)) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            case 'evaluated':
                 $this->builder->where(function ($query) {
                    $cart_id = [];
                    $user_order_id = [];
                    foreach ($this->builder->get() as $userOrder) {
                        foreach ($userOrder->carts as $cart) {
                            if ($cart->cheforders()->first()->checked && $cart->evaluated && $this->overTime($cart)) {
                                $cart_id = array_prepend($cart_id, $cart->id);
                                $user_order_id = array_prepend($user_order_id, $cart->user_order_id);
                            }
                        }
                    }
                    $query = $this->makeUserOrderBuilder($query, $user_order_id, $cart_id);
                });
                break;
            default:
                break;
         }
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