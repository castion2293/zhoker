<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\ChefOrder
 *
 * @property int $id
 * @property int $chef_id
 * @property bool $checked
 * @property bool $paid
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Cart $carts
 * @property-read \App\Chef $chefs
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder whereChecked($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder whereChefId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder wherePaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ChefOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
