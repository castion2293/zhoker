<?php

namespace App\Listeners;

use App\Events\ChefConfirmEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendUserConfirmEmail;

class ChefConfirmListener
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
     * @param  ChefConfirmEvent  $event
     * @return void
     */
    public function handle(ChefConfirmEvent $event)
    {
        $cart = $event->cart;

        $event->user->notify(new SendUserConfirmEmail($cart));
    }
}
