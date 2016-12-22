<?php

namespace App\Listeners;

use App\Events\ChefRejectEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendUserRejectEmail;

class ChefRejectListener
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
     * @param  ChefRejectEvent  $event
     * @return void
     */
    public function handle(ChefRejectEvent $event)
    {
        $cart = $event->cart;
        $event->user->notify(new SendUserRejectEmail($cart));
    }
}
