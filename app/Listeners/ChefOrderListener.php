<?php

namespace App\Listeners;

use App\Events\ChefOrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendChefOrderEmail;

class ChefOrderListener
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
     * @param  ChefOrderEvent  $event
     * @return void
     */
    public function handle(ChefOrderEvent $event)
    {
        $chef_id = $event->chef_id;
        
        $event->user->notify(new SendChefOrderEmail($chef_id));
    }
}
