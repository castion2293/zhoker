<?php

namespace App\Services;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;

class AuthenticateService
{
    use ThrottlesLogins;

    /**
     * @param $request
     * @return mixed
     */
    public function chefLogin($request)
    {
        return Auth::attempt([
            'email' => $request['email'], 
            'password' => $request['password'],
            'chef_psw' => $request['chef_psw'],
        ], true);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function throttlesLogins($request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
    }

    /**
     * @param $request
     */
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