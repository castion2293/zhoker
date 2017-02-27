<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Image
 *
 * @property int $id
 * @property int $chef_id
 * @property string $image_path
 * @property string $ori_image_path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meal[] $meals
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereChefId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereImagePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereOriImagePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    protected $fillable = [
        'meal_id', 'image_path', 'ori_image_path',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Meal', 'meal_image');
    }
}
