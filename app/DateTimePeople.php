<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DateTimePeople
 *
 * @property int $id
 * @property int $meal_id
 * @property string $date
 * @property string $time
 * @property string $end_date
 * @property string $end_time
 * @property bool $people_left
 * @property bool $people_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Cart $carts
 * @property-read \App\Meal $meals
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereEndTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereMealId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople wherePeopleLeft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople wherePeopleOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DateTimePeople whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DateTimePeople extends Model
{
    protected $fillable = [
        'meal_id', 'date', 'time', 'end_date', 'end_time', 'people_left', 'people_order',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_datetimepeople', 'datetimepeople_id', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }

    public function carts()
    {
        return $this->hasOne('App\Cart', 'datetimepeople_id');
    }
}
