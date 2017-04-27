<?php

namespace App\Repositories;

use Auth;
use App\User;
use App\Repositories\Foundation\CartFilter\CartFilters;

class UserRepository
{
    protected $user;
    protected $fitler;

    /**
     * UserRepository constructor.
     * @param User $user
     * @param CartFilters $filter
     */
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
            return $this->user->find($id);
        else
            return Auth::user();
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function forChef(User $user)
    {
        return $user->chefs()->first();
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function forCartNotCheck(User $user)
    {
        return  $this->filter->applyCart($user->carts())
                            ->uncheck()
                            ->fresh()
                            ->hasMeal()
                            ->hasDateTimePeople()
                            ->eagerLoadMeal()
                            ->getQuery()
                            ->get();
    }

    /**
     * @param User $user
     * @param null $filter
     * @param null $qty
     * @return mixed
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
     * @param User $user
     * @param null $datetimepeople_id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
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
     * @param User $user
     * @param null $meal_id
     * @return mixed
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
     * @param User $user
     * @return mixed
     */
    public function forCreditCard(User $user)
    {
        return $user->creditcards()->first();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * @param User $user
     * @param $meal_id
     */
    public function mealAttach(User $user, $meal_id)
    {
        return $user->meals()->attach($meal_id);
    }

    /**
     * @param User $user
     * @param $meal_id
     * @return int
     */
    public function mealDetach(User $user, $meal_id)
    {
        return $user->meals()->detach($meal_id);
    }

    /**
     * @param User $user
     * @param $datetimepeople_id
     * @return array
     */
    public function dataTimePeopleToggle(User $user, $datetimepeople_id)
    {
        return $user->datetimepeoples()->toggle($datetimepeople_id);
    }

    /**
     * @param User $user
     * @param $datetimepeople_id
     * @return int
     */
    public function dateTimePeopleDetach(User $user, $datetimepeople_id)
    {
        return $user->datetimepeoples()->detach($datetimepeople_id);
    }
}
