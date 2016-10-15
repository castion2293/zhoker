<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'chef_id', 'name', 'date', 'time', 'price', 'people_left',  'evaluation', 'description', 'img_path',
    ];
}
