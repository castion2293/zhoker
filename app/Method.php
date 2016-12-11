<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    public function meals()
    {
        return $this->belongsToMany('App\Meal');
    }

    public function scopeFindMethod($builder, $methodName)
    {
        if ($methodName == 'All' || empty($methodName) ) {
            return $builder->get();
        }

        return $builder->where('method', $methodName)->first();
    }
}
