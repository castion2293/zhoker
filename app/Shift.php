<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Shift
 *
 * @property int $id
 * @property string $shift
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meal[] $meals
 * @method static \Illuminate\Database\Query\Builder|\App\Shift findShift($shiftTime = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Shift whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Shift whereShift($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Shift whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
