<?php

namespace App\Services;

use App\Events\UserOrderEvent;
use App\Events\ChefOrderEvent;
use App\Events\ChefConFirmEvent;
use App\Events\ChefRejectEvent;

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

    /**
     * @param $user, $carts
     * @return 
     */
    public function chefConFirmEvent($user, $cart)
    {
        return event(new ChefConFirmEvent($user, $cart));
    }

    /**
     * @param $user, $carts
     * @return 
     */
    public function chefRejectEvent($user, $cart)
    {
        return event(new ChefRejectEvent($user, $cart));
    }
}