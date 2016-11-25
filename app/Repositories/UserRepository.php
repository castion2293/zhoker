<?php

namespace App\Repositories;

use Auth;
use App\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $id
     * @return user
     */
    public function findUserById($id = null)
    {
        if($id)
            return $this->user->finOrFail($id);
        else
            return Auth::user();
    }

    public function getChef_id($id = null)
    {
        return $this->findUserById($id)->chef_id;
    }

    /**
     * @param $id
     * @return chef
     */
    public function forChef(User $user)
    {
        return $user->chefs()->first();
    }
}