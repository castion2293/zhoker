<?php

namespace App\Services;

use Gate;

class GateService
{
    /**
     * GateService constructor.
     */
    public function __construct()
    {
        
    }

    public function decrypt($param)
    {
        return decrypt($param);
    }

    public function userIdCheck($id)
    {
        if (Gate::denies('UserIDCheck', $id)) {
            abort(403);
        }
    }

    public function chefIdCheck($id)
    {
        if (Gate::denies('ChefIDCheck', $id)) {
            abort(403);
        }
    }
}