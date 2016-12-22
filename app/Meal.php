<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'chef_id', 'name', 'date', 'time', 'price', 'people_left',  'evaluation', 'description', 'img_path',
    ];

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
