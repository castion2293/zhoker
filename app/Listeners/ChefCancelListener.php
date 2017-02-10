<?php

namespace App\Listeners;

use App\Events\ChefCancelEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendChefCancelEmail;

class ChefCancelListener
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
     * @param  ChefCancelEvent  $event
     * @return void
     */
    public function handle(ChefCancelEvent $event)
    {
        $cart = $event->cart;

        $event->user->notify(new SendChefCancelEmail($cart));
    }
}
