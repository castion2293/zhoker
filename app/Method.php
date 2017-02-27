<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Method
 *
 * @property int $id
 * @property string $method
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meal[] $meals
 * @method static \Illuminate\Database\Query\Builder|\App\Method findMethod($methodName)
 * @method static \Illuminate\Database\Query\Builder|\App\Method whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Method whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Method whereMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Method whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
