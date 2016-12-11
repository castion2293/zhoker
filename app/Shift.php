<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function meals()
    {
        return $this->belongsToMany('App\Meal');
    }


    public function scopeFindShift($builder, $shiftTime = null)
    {
        if ($shiftTime == 'All' || empty($shiftTime) ) {
            return $builder->get();
        }

        return $builder->where('shift', $shiftTime)->first();
    }
}
