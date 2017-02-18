<?php

namespace App\Repositories;

use Auth;
use App\User;
use App\Repositories\Foundation\CartFilters;

class UserRepository
{
    protected $user;
    protected $fitler;

    public function __construct(User $user, CartFilters $filter)
    {
        $this->user = $user;
        $this->filter = $filter;
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
        return  $this->filter->applyCart($user->carts())
                            ->uncheck()
                            ->fresh()
                            ->hasMeal()
                            ->hasDateTimePeople()
                            ->getQuery()
                            ->get();
    }

    /**
     * @param $user, $qty
     * @return userorder
     */
    public function forUserOrder(User $user, $filter = null, $qty = null)
    {
        if ($qty) {
            return $user->userorders()->latest('id')->take($qty)->with('carts')->get();
        } else {
            return $filter->apply($user->userorders()->newQuery())->get();
        }
    }

    /**
     * @param $user, $datetimepeople_id
     * @return $datetimepeople
     */
    public function forDateTimePeopleByUser(User $user, $datetimepeople_id = null)
    {
        if ($datetimepeople_id) {
            return $user->datetimepeoples()->find($datetimepeople_id);
        } else {
            return $user->datetimepeoples()->latest('id')->with('meals')->get();
        }
    }

    /**
     * @param $user, $meal_id
     * @return $meal
     */
    public function forMealByUser(User $user, $meal_id = null)
    {
        if ($meal_id) {
            return $user->meals()->find($meal_id);
        } else {
            return $user->meals()->latest('id')->get();
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
     * @param $user, $meal_id
     * @return 
     */
    public function mealAttach(User $user, $meal_id)
    {
        return $user->meals()->attach($meal_id);
    }

     /**
     * @param $user, $meal_id
     * @return 
     */
    public function mealDetach(User $user, $meal_id)
    {
        return $user->meals()->detach($meal_id);
    }

    /**
     * @param $user, $datetimepeople_id
     * @return 
     */
    public function dataTimePeopleToggle(User $user, $datetimepeople_id)
    {
        return $user->datetimepeoples()->toggle($datetimepeople_id);
    }

    /**
     * @param $user, $datetimepeople_id
     * @return 
     */
    public function dateTimePeopleDetach(User $user, $datetimepeople_id)
    {
        return $user->datetimepeoples()->detach($datetimepeople_id);
    }
}
