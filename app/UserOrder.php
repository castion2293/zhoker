<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = [
        'user_id', 'total_price', 'pay_way', 'contact_first_name', 'contact_last_name', 'contact_phone_number', 
        'contact_email', 'contact_address', 'cashier_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    /**
     * Get the userorder's cashier_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getCashierIdAttribute($value)
    {
        return decrypt($value);
    }
}
