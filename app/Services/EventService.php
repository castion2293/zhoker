<?php

namespace App\Services;

use App\Events\UserOrderEvent;
use App\Events\ChefOrderEvent;
use App\Events\ChefConfirmEvent;
use App\Events\ChefRejectEvent;
use App\Events\ChefCancelEvent;
use App\Events\UserCancelEvent;

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
        return event(new ChefConfirmEvent($user, $cart));
    }

    /**
     * @param $user, $carts
     * @return 
     */
    public function chefRejectEvent($user, $cart)
    {
        return event(new ChefRejectEvent($user, $cart));
    }

    /**
     * @param $user, $carts
     * @return 
     */
    public function ChefCancelEvent($user, $cart)
    {
        return event(new ChefCancelEvent($user, $cart));
    }

    /**
     * @param $user, $carts
     * @return 
     */
    public function userCancelEvent($user, $cart)
    {
        return event(new UserCancelEvent($user, $cart));
    }
}