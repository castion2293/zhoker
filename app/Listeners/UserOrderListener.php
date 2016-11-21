<?php

namespace App\Listeners;

use App\Events\userOrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendUserOrderEmail;

class UserOrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  userOrderEvent  $event
     * @return void
     */
    public function handle(userOrderEvent $event)
    {
        $carts = $event->carts;
        
        $event->user->notify(new SendUserOrderEmail($carts));
    }
}
