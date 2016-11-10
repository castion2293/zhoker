<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'meal_id', 'unite_price', 'people_order', 'price', 'date', 'time', 'method', 'checked', 'user_order_id', 'chef_order_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }

    public function userorders()
    {
        return $this->belongsTo('App\Userorder', 'user_order_id');
    }

    public function cheforders()
    {
        return $this->belongsTo('App\Cheforder', 'chef_order_id');
    }
}
