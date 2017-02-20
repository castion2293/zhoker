<?php

namespace App\Repositories\Foundation\OrderFilter;

use Illuminate\Support\Facades\App;

class ChefOrderTypeFactory
{
    public static function create($type)
    {
        App::bind(AbstractChefOrderType::class, 'App\\Repositories\\Foundation\\OrderFilter\\ChefOrderType' . $type);
        return App::make(AbstractChefOrderType::class);
    }
}