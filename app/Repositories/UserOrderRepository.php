<?php

namespace App\Repositories;

use App\UserOrder;

class UserOrderRepository
{
    protected $userOrder;

    /**
    * CartRepository constructor.
    * @param Cart $cart
    */
    public function __construct(UserOrder $userOrder)
    {
        $this->userOrder = $userOrder;
    }

    /**
     * @return meal
     */
}