<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\MealRepository;
use App\Repositories\CartRepository;

class ProductService
{
    protected $userRepo;
    protected $mealRepo;
    protected $cartRepo;

    /**
     * ProductService constructor.
     */
    public function __construct(UserRepository $userRepo, MealRepository $mealRepo, CartRepository $cartRepo)
    {
        $this->userRepo = $userRepo;
        $this->mealRepo = $mealRepo;
        $this->cartRepo = $cartRepo;
    }

    /**
     * @param null
     * @return user
     */
    public function getUser($id = null)
    {
        return $this->userRepo->findUserById($id);
    }

    /**
     * @param $id
     * @return meal
     */
    public function getMeal($id)
    {
        return $this->mealRepo->findMealById($id);
    }

    /**
     * @param $meal, $datetime_id
     * @return datetimepeople
     */
    public function getDateTimePeople($meal, $datetime_id)
    {
        return $this->mealRepo->forDateTimePeopleById($meal, $datetime_id);
    }

    /**
     * @param $meal
     * @return method
     */
    public function getMethod($meal, $id = null)
    {
        if ($id)
            return $this->mealRepo->forMethodById($meal, $id);
        else
            return $this->mealRepo->forMethod($meal);
    }

    /**
     * @param $user
     * @return cart
     */
    public function getCart($user)
    {
        return $this->userRepo->forCartNotCheck($user);
    }

    /**
     * @param $id
     * @return cart
     */
    public function getCartById($id)
    {
        return $this->cartRepo->findCartById($id);
    }

    /**
     * @param $user, $meal, $datetime, $method, $request
     * @return cart
     */
    public function createCart($user, $meal, $datetime, $method, $request)
    {
        return $this->cartRepo->create($user, $meal, $datetime, $method, $request);
    }

    /**
     * @param $carts, request
     * @return 
     */
    public function updateEachCart($carts, $request)
    {
        foreach ($carts as $cart) {
            $this->cartRepo->update($cart, $request);
        }
    }

    /**
     * @param $carts, request
     * @return 
     */
    public function deleteCart($cart)
    {
        return $this->cartRepo->delete($cart);
    }

    /**
     * @param $cart
     * @return cartQtyArray
     */
    public function getCartQtyArray($carts)
    {
        $cartQtyArray = [];
        
        foreach ($carts as $cart) {   
            $cartQtyArray[$cart->id] = $cart->people_order;
        }

        return $cartQtyArray;
    }

    /**
     * @param $cart
     * @return totalprice
     */
    public function getTotalPrice($carts)
    {
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $totalPrice += $cart->price;
        }

        return $totalPrice;
    }

    /**
     * @param $user, $datetimepeople_id
     * @return 
     */
    public function buyNextTimeToggle($user, $datetimepeople_id)
    {
        return $this->userRepo->dataTimePeopleToggle($user, $datetimepeople_id);
    }

    /**
     * @param $user, $datetimepeople_id
     * @return 
     */
    public function buyNextTimeCancel($user, $datetimepeople_id)
    {
        return $this->userRepo->dateTimePeopleDetach($user, $datetimepeople_id);
    }

     /**
     * @param $user
     * @return 
     */
    public function getBuyNextTimeItems($user, $datetimepeople_id = null)
    {
        return $this->userRepo->forDateTimePeopleByUser($user, $datetimepeople_id);
    }

     /**
     * @param $user, $meal_id
     * @return 
     */
    public function reserveMealAdd($user, $meal_id)
    {
        return $this->userRepo->mealAttach($user, $meal_id);
    }

    /**
     * @param $user
     * @return 
     */
    public function reserveMealCancel($user, $meal_id)
    {
        return $this->userRepo->mealDetach($user, $meal_id);
    }

     /**
     * @param $user
     * @return 
     */
    public function getReserveItems($user, $meal_id = null)
    {
        return $this->userRepo->forMealByUser($user, $meal_id);
    }
}