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
            return $this->user->findOrFail($id);
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

    /**
     * @param $user
     * @return cart
     */
    public function forCartNotCheck(User $user)
    {
        return $user->carts()->where('checked', '0')->get();
    }

    /**
     * @param $user, $qty
     * @return userorder
     */
    public function forUserOrder($user, $qty = null)
    {
        if ($qty) {
            return $user->userorders()->latest('id')->take($qty)->with('carts')->get();
        } else {
            return $user->userorders()->latest('id')->with('carts')->get();
        }
    }


    /**
     * @param $user
     * @return carditcard
     */
    public function forCreditCard(User $user)
    {
        return $user->creditcards()->first();
    }

    /**
     * @param $user
     * @return 
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * @param $user, $credit_card
     * @return 
     */
    public function saveCreditCard(User $user, $credit_card)
    {
        return $user->creditcards()->save($credit_card);
    }
}
