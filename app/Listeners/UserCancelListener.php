<?php

namespace App\Listeners;

use App\Events\UserCancelEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendUserCancelEmail;

class UserCancelListener
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
     * @param  UserCancelEvent  $event
     * @return void
     */
    public function handle(UserCancelEvent $event)
    {
        $cart = $event->cart;

        $event->user->notify(new SendUserCancelEmail($cart));
    }
}
