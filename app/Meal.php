<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'chef_id', 'name', 'date', 'time', 'price', 'people_left',  'evaluation', 'description',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
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
        return $this->hasMany('App\Image');
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
}
