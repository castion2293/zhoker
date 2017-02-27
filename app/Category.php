<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $category
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meal[] $meals
 * @method static \Illuminate\Database\Query\Builder|\App\Category findCategory($id = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
