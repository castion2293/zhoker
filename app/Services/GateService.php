<?php

namespace App\Services;

use Gate;

class GateService
{
    protected $id;
    /**
     * GateService constructor.
     */
    public function __construct()
    {
        
    }

    public function decrypt($param)
    {
        $this->id = decrypt($param);

        // return decrypt($param);
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function userIdCheck($id = null)
    {
        count($id) ?: $id = $this->id;

        if (Gate::denies('UserIDCheck', $id)) {
            abort(403);
        }

        return $this;
    }

    public function chefIdCheck($id = null)
    {
        count($id) ?: $id = $this->id;

        if (Gate::denies('ChefIDCheck', $id)) {
            abort(403);
        }

        return $this;
    }
}