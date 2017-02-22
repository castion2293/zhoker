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
     * @return array|null
     */
    public function chefOrderEvent($user)
    {
        return event(new ChefOrderEvent($user));
    }

    /**
     * @param $user
     * @param $carts
     * @return array|null
     */
    public function userOrderEvent($user, $carts)
    {
        return event(new UserOrderEvent($user, $carts));
    }

    /**
     * @param $user
     * @param $cart
     * @return array|null
     */
    public function chefConFirmEvent($user, $cart)
    {
        return event(new ChefConfirmEvent($user, $cart));
    }

    /**
     * @param $user
     * @param $cart
     * @return array|null
     */
    public function chefRejectEvent($user, $cart)
    {
        return event(new ChefRejectEvent($user, $cart));
    }

    /**
     * @param $user
     * @param $cart
     * @return array|null
     */
    public function ChefCancelEvent($user, $cart)
    {
        return event(new ChefCancelEvent($user, $cart));
    }

    /**
     * @param $user
     * @param $cart
     * @return array|null
     */
    public function userCancelEvent($user, $cart)
    {
        return event(new UserCancelEvent($user, $cart));
    }
}