<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChefOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'chef_id', 'checked', 'paid',
    ];

    protected $dates = ['deleted_at'];

    public function chefs()
    {
        return $this->belongsTo('App\Chef', 'chef_id');
    }

    public function carts()
    {
        return $this->hasOne('App\Cart');
    }
}
