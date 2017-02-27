<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Foundation\QueryFilter;

/**
 * App\Chef
 *
 * @property int $id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property int $zip_code
 * @property string $profile_img
 * @property string $store_description
 * @property string $store_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ChefOrder[] $cheforders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meal[] $meals
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereProfileImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereStoreDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereStoreName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chef whereZipCode($value)
 * @mixin \Eloquent
 */
class Chef extends Model
{
    protected $fillable = [
        'address', 'city', 'state', 'zip_code',  
    ];

    public function users()
    {
        return $this->hasOne('App\User');
    }

    public function meals()
    {
        return $this->hasMany('App\Meal');
    }

    public function cheforders()
    {
        return $this->hasMany('App\ChefOrder');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
