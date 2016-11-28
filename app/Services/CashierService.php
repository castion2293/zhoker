<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;
use App\Repositories\CartRepository;
use App\Repositories\DateTimePeopleRepository;
use App\Repositories\UserOrderRepository;
use App\Repositories\ChefOrderRepository;

class CashierService
{
    protected $userRepo;
    protected $chefRepo;
    protected $cartRepo;
    protected $dateTimePeopleRepo;
    protected $userOrderRepo;
    protected $chefOrderRepo;

    /**
     * CashierService constructor.
     */
    public function __construct(UserRepository $userRepo, ChefRepository $chefRepo, CartRepository $cartRepo, DateTimePeopleRepository $dateTimePeopleRepo, 
                                UserOrderRepository $userOrderRepo, ChefOrderRepository $chefOrderRepo)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;
        $this->cartRepo = $cartRepo;
        $this->dateTimePeopleRepo = $dateTimePeopleRepo;
        $this->userOrderRepo = $userOrderRepo;
        $this->chefOrderRepo = $chefOrderRepo;
    }

    /**
     * @param $id
     * @return user
     */
    public function getUser($id = null)
    {
        return $this->userRepo->findUserById($id);
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
     * @param $user
     * @return credit_card
     */
    public function getCreditCard($user)
    {
        return $this->userRepo->forCreditCard($user);
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
     * @param $chefOrder
     * @return user
     */
    public function getChefUser($chefOrder)
    {
        $chef = $this->chefOrderRepo->forChef($chefOrder);
        return $this->chefRepo->forUser($chef);
    }


    /**
     * @param $user, $creditCard, $totalPrice
     * @return userorder
     */
    public function createUserOrder($user, $cashier_id, $totalPrice)
    {
        return $this->userOrderRepo->create($user, $cashier_id, $totalPrice);
    }

    /**
     * @param $cart
     * @return cheforder
     */
    public function createChefOrder($cart)
    {
        $meal = $this->cartRepo->forMeal($cart);

        return $this->chefOrderRepo->create($meal->chef_id);
    }

    /**
     * @param $cart, $userOrder, $chefOrder
     * @return 
     */
    public function orderUpdate($cart, $userOrder, $chefOrder)
    {
        $this->cartRepo->forUserOrderAssoci($cart, $userOrder);
        $this->cartRepo->forChefOrderAssoci($cart, $chefOrder);
        $this->cartRepo->updateCheck($cart);
    }

    /**
     * @param $cart
     * @return 
     */
    public function peopleOrderUpdate($cart)
    {
        $datetimepeople = $this->cartRepo->forDateTimePeople($cart);
        $this->dateTimePeopleRepo->updatePeople($datetimepeople, $cart);
    }
}