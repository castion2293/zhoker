<?php

namespace App\Repositories;

use App\Cart;

class CartRepository
{
    protected $cart;

    /**
     * CartRepository constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @param $id
     * @return cart
     */
    public function findCartById($id)
    {
        return $this->cart->find($id);
    }

    /**
     * @param $user, $meal, $datetime, $method, $request
     * @return cart
     */
    public function create($user, $meal, $datetime, $method, $request)
    {
        return $this->cart->Create([
            'user_id' => $user->id,
            'meal_id' => $meal->id,
            'datetimepeople_id' => $datetime->id,
            'unite_price' => $meal->price,
            'people_order' => $request->people_order,
            'price' => $meal->price * $request->people_order,
            'date' => $datetime->date,
            'time' => $datetime->time,
            'method' =>  $method->method,
        ]);
    }

    /**
     * @param Cart $cart
     * @param $request
     * @return bool
     */
    public function update(Cart $cart, $request)
    {
        return $cart->update([
            'people_order' => $request->qty[$cart->id],
            'price' => $cart->unite_price * $request->qty[$cart->id],
        ]);
    }

    /**
     * @param Cart $cart
     * @return bool
     */
    public function updateCheck(Cart $cart)
    {
        return $cart->update([
            'checked' => true,
        ]);
    }

    /**
     * @param Cart $cart
     * @return bool
     */
    public function updateEvaluated(Cart $cart)
    {
        return $cart->update([
            'evaluated' => true,
        ]);
    }

    /**
     * @param Cart $cart
     * @return bool|null
     */
    public function delete(Cart $cart)
    {
        return $cart->Delete();
    }

    /**
     * @param Cart $cart
     * @return mixed
     */
    public function forUser(Cart $cart)
    {
        return $cart->users()->first();
    }

    /**
     * @param $cart
     * @return $meal
     */
    public function forMeal(Cart $cart)
    {
        return $cart->meals()->first();
    }

    /**
     * @param Cart $cart
     * @return mixed
     */
    public function forDateTimePeople(Cart $cart)
    {
        return $cart->datetimepeoples()->first();
    }

    /**
     * @param Cart $cart
     * @return mixed
     */
    public function forUserOrder(Cart $cart)
    {
        return $cart->userorders()->first();
    }

    /**
     * @param Cart $cart
     * @return mixed
     */
    public function forChefOrder(Cart $cart)
    {
        return $cart->cheforders()->first();
    }

    /**
     * @param Cart $cart
     * @param $userOrder
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function forUserOrderAssoci(Cart $cart, $userOrder)
    {
        return $cart->userorders()->associate($userOrder);
    }

    /**
     * @param Cart $cart
     * @param $chefOrder
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function forChefOrderAssoci(Cart $cart, $chefOrder)
    {
        return $cart->cheforders()->associate($chefOrder);
    }

}