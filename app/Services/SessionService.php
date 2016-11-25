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
}