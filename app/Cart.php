<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property int $meal_id
 * @property int $datetimepeople_id
 * @property int $unite_price
 * @property bool $people_order
 * @property int $price
 * @property string $date
 * @property string $time
 * @property string $method
 * @property bool $checked
 * @property bool $evaluated
 * @property int $user_order_id
 * @property int $chef_order_id
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\ChefOrder $cheforders
 * @property-read \App\DateTimePeople $datetimepeoples
 * @property-read \App\Meal $meals
 * @property-read \App\UserOrder $userorders
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereChecked($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereChefOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereDatetimepeopleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereEvaluated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereMealId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart wherePeopleOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereUnitePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cart whereUserOrderId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'meal_id', 'datetimepeople_id', 'unite_price', 'people_order', 'price', 'date', 'time', 'method', 'checked', 'evaluated', 'user_order_id', 'chef_order_id',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }

    public function datetimepeoples()
    {
        return $this->belongsTo('App\DateTimePeople', 'datetimepeople_id');
    }

    public function userorders()
    {
        return $this->belongsTo('App\UserOrder', 'user_order_id');
    }

    public function cheforders()
    {
        return $this->belongsTo('App\ChefOrder', 'chef_order_id');
    }
}
