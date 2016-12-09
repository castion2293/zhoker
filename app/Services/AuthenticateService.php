<?php

namespace App\Services;

use Auth;

class AuthenticateService
{
    public function chefLogin($request)
    {
        return Auth::attempt([
            'email' => $request['email'], 
            'password' => $request['password'],
            'chef_psw' => $request['chef_psw'],
        ], true);
    }
}