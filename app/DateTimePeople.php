<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateTimePeople extends Model
{
    protected $fillable = [
        'meal_id', 'date', 'time', 'people_left', 'people_order',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_datetimepeople', 'datetimepeople_id', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }

    public function carts()
    {
        return $this->hasOne('App\Cart');
    }
}
