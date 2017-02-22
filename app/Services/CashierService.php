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

    protected $user;
    protected $cart;
    protected $creditCard;

    /**
     * CashierService constructor.
     * @param UserRepository $userRepo
     * @param ChefRepository $chefRepo
     * @param CartRepository $cartRepo
     * @param DateTimePeopleRepository $dateTimePeopleRepo
     * @param UserOrderRepository $userOrderRepo
     * @param ChefOrderRepository $chefOrderRepo
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
     * @param null $id
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
     * @param $user
     * @return $this
     */
    public function findCartByUser($user)
    {
        count($user) ?: $user = $this->user;
        
        $this->cart = $this->userRepo->forCartNotCheck($user);

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
     * @return $this;
     */
    public function findCreditCardByUser($user = null)
    {
        count($user) ?: $user = $this->user;

        $this->creditCard = $this->userRepo->forCreditCard($user);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCard()
    {
        return $this->creditCard;
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
     * @param $chefOrder
     * @return \App\Repositories\user
     */
    public function getChefUser($chefOrder)
    {
        $chef = $this->chefOrderRepo->forChef($chefOrder);
        return $this->chefRepo->forUser($chef);
    }


    /**
     * @param $user
     * @param $cashier_id
     * @param $totalPrice
     * @return \App\UserOrder
     */
    public function createUserOrder($user, $cashier_id, $totalPrice)
    {
        return $this->userOrderRepo->create($user, $cashier_id, $totalPrice);
    }

    /**
     * @param $cart
     * @return \App\ChefOrder
     */
    public function createChefOrder($cart)
    {
        $meal = $this->cartRepo->forMeal($cart);

        return $this->chefOrderRepo->create($meal->chef_id);
    }

    /**
     * @param $cart
     * @param $userOrder
     * @param $chefOrder
     */
    public function orderUpdate($cart, $userOrder, $chefOrder)
    {
        $this->cartRepo->forUserOrderAssoci($cart, $userOrder);
        $this->cartRepo->forChefOrderAssoci($cart, $chefOrder);
        $this->cartRepo->updateCheck($cart);
    }

    /**
     * @param $cart
     */
    public function peopleOrderUpdate($cart)
    {
        $datetimepeople = $this->cartRepo->forDateTimePeople($cart);
        $this->dateTimePeopleRepo->updatePeople($datetimepeople, $cart);
    }
}