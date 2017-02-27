<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $meal_id
 * @property string $content
 * @property bool $score
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Meal $meals
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereMealId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserId($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $fillable = [
        'user_id', 'meal_id', 'content', 'score',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function meals()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
