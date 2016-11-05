<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'password', 'token', 'status'
    ];
}
