<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Foundation\QueryFilter;

class Chef extends Model
{
    protected $fillable = [
        'address', 'city', 'state', 'zip_code',  
    ];

    public function users()
    {
        return $this->hasOne('App\User');
    }

    public function meals()
    {
        return $this->hasMany('App\Meal');
    }

    public function cheforders()
    {
        return $this->hasMany('App\ChefOrder');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
