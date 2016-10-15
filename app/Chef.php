<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $fillable = [
        'address', 'city', 'state', 'zip_code',
    ];
}
