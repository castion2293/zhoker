<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
