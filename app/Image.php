<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'meal_id', 'image_path', 
    ];

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
