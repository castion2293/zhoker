<?php

namespace App\Services;

use Auth;
use Cache;
use Carbon\Carbon;

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

    // public function throttlesLogins($attempts)
    // {
        
    //     if (Cache::has('lockout')) {
    //         return true;
    //     }

    //     if ($attempts > 0) {
            
    //         Cache::add('lockout', Carbon::now()->getTimestamp() + 60, 1);
    //         dd($attempts);
    //         $attempts = 0;

    //         return true;
    //     }

    //     $attempts++;
    // }
}