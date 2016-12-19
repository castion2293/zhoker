<?php

namespace App\Services;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;

class AuthenticateService
{
    use ThrottlesLogins;

    public function chefLogin($request)
    {
        return Auth::attempt([
            'email' => $request['email'], 
            'password' => $request['password'],
            'chef_psw' => $request['chef_psw'],
        ], true);
    }

    public function throttlesLogins($request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
    }

    public function incrementLoginAttempt($request) {
        $this->incrementLoginAttempts($request);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
}