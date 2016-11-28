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
        return $this->cart->findOrFail($id);
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
     * @param $carts, $request
     * @return 
     */
    public function update(Cart $cart, $request)
    {
        return $cart->update([
            'people_order' => $request->qty[$cart->id],
            'price' => $cart->unite_price * $request->qty[$cart->id],
        ]);
    }

    /**
     * @param $carts
     * @return 
     */
    public function updateCheck(Cart $cart)
    {
        return $cart->update([
            'checked' => true,
        ]);
    }

    /**
     * @param $cart
     * @return 
     */
    public function delete(Cart $cart)
    {
        return $cart->delete();
    }

    /**
     * @param $cart
     * @return user
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
     * @param $cart
     * @return datetimepeople
     */
    public function forDateTimePeople(Cart $cart)
    {
        return $cart->datetimepeoples()->first();
    }

    /**
     * @param $cart
     * @return userorder
     */
    public function forUserOrder(Cart $cart)
    {
        return $cart->userorders()->first();
    }

    /**
     * @param $cart, $userOrder
     * @return $
     */
    public function forUserOrderAssoci(Cart $cart, $userOrder)
    {
        return $cart->userorders()->associate($userOrder);
    }

    /**
     * @param $cart, $chefOrder
     * @return $meal
     */
    public function forChefOrderAssoci(Cart $cart, $chefOrder)
    {
        return $cart->cheforders()->associate($chefOrder);
    }

}