<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'meal_id', 'content', 'score',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
