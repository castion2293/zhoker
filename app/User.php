<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number',  'password', 'chef_psw', 'chef_id', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'chef_psw', 
    ];

    public function isChef()
    {
        return ($this->role == 1);
    }

    public function chefs()
    {
        return $this->belongsTo('App\Chef', 'chef_id');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Meal');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function userorders()
    {
        return $this->hasMany('App\UserOrder');
    }

    public function creditcards()
    {
        return $this->hasOne('App\CreditCard');
    }

    public function datetimepeoples()
    {
        return $this->belongsToMany('App\DateTimePeople', 'user_datetimepeople', 'user_id', 'datetimepeople_id');
    }
}
