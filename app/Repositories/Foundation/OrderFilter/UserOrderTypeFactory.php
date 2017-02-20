<?php

namespace App\Repositories\Foundation\OrderFilter;

use Illuminate\Support\Facades\App;

class UserOrderTypeFactory
{
    public static function create($type)
    {
        App::bind(AbstractUserOrderType::class, 'App\\Repositories\\Foundation\\OrderFilter\\UserOrderType' . $type);
        return App::make(AbstractUserOrderType::class);
    }
}