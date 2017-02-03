<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'meal_id', 'datetimepeople_id', 'unite_price', 'people_order', 'price', 'date', 'time', 'method', 'checked', 'evaluated', 'user_order_id', 'chef_order_id',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }

    public function datetimepeoples()
    {
        return $this->belongsTo('App\DateTimePeople', 'datetimepeople_id');
    }

    public function userorders()
    {
        return $this->belongsTo('App\UserOrder', 'user_order_id');
    }

    public function cheforders()
    {
        return $this->belongsTo('App\ChefOrder', 'chef_order_id');
    }
}
