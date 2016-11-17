<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChefOrder extends Model
{
    protected $fillable = [
        'chef_id', 'checked', 'paid',
    ];

    public function chefs()
    {
        return $this->belongsTo('App\Chef', 'chef_id');
    }

    public function carts()
    {
        return $this->hasOne('App\Cart');
    }
}
