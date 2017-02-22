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

    protected $user;
    protected $meal;
    protected $cart;

    /**
     * ProductService constructor.
     * @param UserRepository $userRepo
     * @param MealRepository $mealRepo
     * @param CartRepository $cartRepo
     */
    public function __construct(UserRepository $userRepo, MealRepository $mealRepo, CartRepository $cartRepo)
    {
        $this->userRepo = $userRepo;
        $this->mealRepo = $mealRepo;
        $this->cartRepo = $cartRepo;
    }

    /**
     * @param null
     * @return $this
     */
    public function findUser($id = null)
    {
        $this->user = $this->userRepo->findUserById($id);

        return $this;
    }

    /**
     * @param 
     * @return $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $id
     * @return $this
     */
    public function findMeal($id)
    {
        $this->meal =  $this->mealRepo->findMealById($id);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param $meal
     * @param $datetime_id
     * @return \App\Repositories\datetimepeople
     */
    public function getDateTimePeople($meal, $datetime_id)
    {
        return $this->mealRepo->forDateTimePeopleById($meal, $datetime_id);
    }

    /**
     * @param $meal
     * @return \App\Repositories\datetimepeople
     */
    public function getDateTimePeopleOthers($meal)
    {
        return $this->mealRepo->forDateTimePeople($meal, true);
    }


    /**
     * @param $meal
     * @param null $id
     * @return \App\Repositories\method
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
     * @return $this
     */
    public function findCartByUser($user = null)
    {
        count($user) ?: $user = $this->user;

        $this->cart = $this->userRepo->forCartNotCheck($user);
        
        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function findCartById($id)
    {
        $this->cart = $this->cartRepo->findCartById($id);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param $user
     * @param $meal
     * @param $datetime
     * @param $method
     * @param $request
     * @return \App\Cart
     */
    public function createCart($user, $meal, $datetime, $method, $request)
    {
        return $this->cartRepo->create($user, $meal, $datetime, $method, $request);
    }

    /**
     * @param $request
     * @param null $carts
     */
    public function updateEachCart($request, $carts = null)
    {
        count($carts) ?: $carts = $this->cart;

        foreach ($carts as $cart) {
            $this->cartRepo->update($cart, $request);
        }
    }

    /**
     * @param null $cart
     * @return bool|null
     */
    public function deleteCart($cart = null)
    {
        count($cart) ?: $cart = $this->cart;

        return $this->cartRepo->delete($cart);
    }

    /**
     * @param $carts
     * @return array
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
     * @param $carts
     * @return int
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
     * @param $user
     * @param $datetimepeople_id
     * @return array
     */
    public function buyNextTimeToggle($user, $datetimepeople_id)
    {
        return $this->userRepo->dataTimePeopleToggle($user, $datetimepeople_id);
    }

    /**
     * @param $user
     * @param $datetimepeople_id
     * @return int
     */
    public function buyNextTimeCancel($user, $datetimepeople_id)
    {
        return $this->userRepo->dateTimePeopleDetach($user, $datetimepeople_id);
    }

    /**
     * @param $user
     * @param null $datetimepeople_id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getBuyNextTimeItems($user, $datetimepeople_id = null)
    {
        return $this->userRepo->forDateTimePeopleByUser($user, $datetimepeople_id);
    }

    /**
     * @param $user
     * @param $meal_id
     */
    public function reserveMealAdd($user, $meal_id)
    {
        return $this->userRepo->mealAttach($user, $meal_id);
    }

    /**
     * @param $user
     * @param $meal_id
     * @return int
     */
    public function reserveMealCancel($user, $meal_id)
    {
        return $this->userRepo->mealDetach($user, $meal_id);
    }

    /**
     * @param $user
     * @param null $meal_id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getReserveItems($user, $meal_id = null)
    {
        return $this->userRepo->forMealByUser($user, $meal_id);
    }
}