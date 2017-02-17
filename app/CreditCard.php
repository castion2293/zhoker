<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = [
        'user_id', 'customer_id', 'brand', 'cvc_check', 'last4', 'exp_month', 'exp_year', 'card_name', 'funding',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 

    /**
     * Set the customer_id attribute
     *
     * @param  string  $value
     * @return void
     */
    public function setCustomerIdAttribute($value)
    {
        $this->attributes['customer_id'] = encrypt($value);
    }
}
