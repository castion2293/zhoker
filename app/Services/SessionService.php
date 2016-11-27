<?php

namespace App\Services;

use Session;

class SessionService
{
    /**
     * SessionService constructor.
     */
    public function __construct()
    {
        
    }

    public function put($key, $value)
    {
        Session::put($key, $value);
    }

    public function flash($key, $value)
    {
        Session::flash($key, $value);
    }

    public function has($key)
    {
        return Session::has($key);
    }

    public function get($key)
    {
        return Session::get($key);
    }

    public function forget($key)
    {
        return Session::forget($key);
    }

    public function requestFlash($request)
    {
        return $request->flash();
    }
}