<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
