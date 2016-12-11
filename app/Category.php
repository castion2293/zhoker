<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function meals()
    {
        return $this->belongsToMany('App\Meal', 'meal_category');
    }

    public function scopeFindCategory($builder, $id = null)
    {
        if (count($id)) {
            return $builder->wherein('id', $id)->get();
        }

        return $builder->get();
    }
}
