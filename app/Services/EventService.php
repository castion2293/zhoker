<?php

namespace App\Services;

use App\Events\UserOrderEvent;
use App\Events\ChefOrderEvent;

class EventService
{
    /**
     * @param $user
     * @return 
     */
    public function chefOrderEvent($user)
    {
        return event(new ChefOrderEvent($user));
    }

    /**
     * @param $user, $carts
     * @return 
     */
    public function userOrderEvent($user, $carts)
    {
        return event(new UserOrderEvent($user, $carts));
    }
}