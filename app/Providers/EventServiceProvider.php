<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\NewUserRegisteredListener',
        ],
        'App\Events\userOrderEvent' => [
            'App\Listeners\UserOrderListener',
        ],
        'App\Events\ChefOrderEvent' => [
            'App\Listeners\ChefOrderListener',
        ],
        'App\Events\ChefConfirmEvent' => [
            'App\Listeners\ChefConfirmListener',
        ],
        'App\Events\ChefRejectEvent' => [
            'App\Listeners\ChefRejectListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
