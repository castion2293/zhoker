<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateTimePeople extends Model
{
    protected $fillable = [
        'meal_id', 'date', 'time', 'people_left', 'people_order',
    ];

    public function meals()
    {
        return $this->belongsTo('App\Meal');
    }
}
