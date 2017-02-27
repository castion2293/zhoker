<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Meal
 *
 * @property int $id
 * @property int $chef_id
 * @property string $name
 * @property int $price
 * @property int $people_eaten
 * @property int $people_eva
 * @property bool $evaluation
 * @property string $description
 * @property int $cover_img_id
 * @property string $cover_img
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Cart $carts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \App\Chef $chefs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DateTimePeople[] $datetimepeoples
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Method[] $methods
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Shift[] $shifts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereChefId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereCoverImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereCoverImgId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereEvaluation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal wherePeopleEaten($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal wherePeopleEva($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Meal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'chef_id', 'name', 'date', 'time', 'price', 'people_left',  'evaluation', 'description', 'cover_img_id', 'cover_img',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_meal');
    }

    public function chefs()
    {
        return $this->belongsTo('App\Chef', 'chef_id');
    }

    public function datetimepeoples()
    {
        return $this->hasMany('App\DateTimePeople');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'meal_image');
    }

    public function shifts()
    {
        return $this->belongsToMany('App\Shift');
    }

    public function methods()
    {
        return $this->belongsToMany('App\Method');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'meal_category');
    }

    public function carts()
    {
        return $this->hasOne('App\Cart');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
