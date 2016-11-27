<?php

namespace App\Repositories;

use App\Cart;

class CartRepository
{
    protected $cart;

    /**
     * CartRepository constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

}