<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CreditCard
 *
 * @property int $id
 * @property int $user_id
 * @property string $customer_id
 * @property string $brand
 * @property string $cvc_check
 * @property string $last4
 * @property string $exp_month
 * @property string $exp_year
 * @property string $card_name
 * @property string $funding
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCardName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCvcCheck($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereExpMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereExpYear($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereFunding($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereLast4($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereUserId($value)
 * @mixin \Eloquent
 */
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
