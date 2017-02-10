<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;
use App\Repositories\MealRepository;
use App\Repositories\DateTimePeopleRepository;
use App\Repositories\CartRepository;
use App\Repositories\ChefOrderRepository;

class OrderService
{
    protected $userRepo;
    protected $chefRepo;
    protected $mealRepo;
    protected $dateTimePeopleRepo;
    protected $cartRepo;
    protected $chefOrderRepo;

    protected $user;
    protected $chef;
    protected $cart;
    protected $datetimepeople;
    protected $chefOrder;
    protected $userOrder;

    /**
     * OrderService constructor.
     */
    public function __construct(UserRepository $userRepo, ChefRepository $chefRepo, MealRepository $mealRepo, DateTimePeopleRepository $dateTimePeopleRepo, 
                                CartRepository $cartRepo, ChefOrderRepository $chefOrderRepo)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;
        $this->mealRepo = $mealRepo;
        $this->dateTimePeopleRepo = $dateTimePeopleRepo;
        $this->cartRepo = $cartRepo;
        $this->chefOrderRepo = $chefOrderRepo;
    }

    /**
    * @param $id
    * @return $this
    */
    public function findUser($id)
    {
        $this->user = $this->userRepo->findUserById($id);

        return $this;
    }

    /**
    * @param 
    * @return $user
    */
    public function getUser($id)
    {
        return $this->user;
    }

    /**
    * @param $cart
    * @return user
    */
    public function getUserByCart($cart)
    {
        return $this->cartRepo->forUser($cart);
    }

     /**
    * @param $id
    * @return $this
    */
    public function findChef($id)
    {
        $this->chef = $this->chefRepo->findChefById($id);

        return $this;
    }

    /**
    * @param $id
    * @return chef
    */
    public function getChef()
    {
        return $this->chef;
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
    * @param $cheforder
    * @return $this
    */
    public function findCart($chefOrder = null)
    {
        count($chefOrder) ?: $chefOrder = $this->chefOrder;

        $this->cart = $this->chefOrderRepo->forCart($chefOrder);

        return $this;
    }

    /**
    * @param 
    * @return cart
    */
    public function getCart()
    {
        return $this->cart;
    }

     /**
    * @param $qty, $pagi, $user
    * @return $this
    */
    public function findUserOrderByUser($qty = null, $pagi = null, $user = null)
    {
        count($user) ?: $user = $this->user;

        if (count($pagi))
            $this->userOrder = $this->userRepo->forUserOrderPaginate($user, $qty);
        else
            $this->userOrder = $this->userRepo->forUserOrder($user, $qty);

        return $this;
    }

     /**
    * @param $cart
    * @return userOrder
    */
    public function findUserOrderByCart($cart = null)
    {
        count($cart) ?: $cart = $this->cart;

        $this->userOrder = $this->cartRepo->forUserOrder($cart);

        return $this;
    }

     /**
    * @param 
    * @return $userOrder
    */
    public function getUserOrder()
    {
        return $this->userOrder;
    }

     /**
    * @param $id
    * @return cheforder
    */
    public function findChefOrderById($id)
    {
        $this->ChefOrder = $this->chefOrderRepo->findChefOrderById($id);

        return $this;
    }

    /**
    * @param $qty, $pagi, $chef
    * @return $this
    */
    public function findChefOrder($qty = null, $pagi = null, $chef = null)
    {
        count($chef) ?: $chef = $this->chef;

        if (count($pagi))
            $this->ChefOrder = $this->chefRepo->forChefOrdersPaginate($chef, $qty);
        else
            $this->ChefOrder = $this->chefRepo->forChefOrders($chef, $qty);

        return $this;
    }

    /**
    * @param 
    * @return $chef
    */
    public function getChefOrder()
    {
        return $this->ChefOrder;
    }

     /**
    * @param $cart
    * @return datetimepeople
    */
    public function getDateTimePeopleByCart($cart)
    {
        count($cart) ?: $cart = $this->cart;

        $this->datetimepeople = $this->cartRepo->forDateTimePeople($cart);

        return $this;
    }

     /**
    * @param $chefOrder
    * @return 
    */
    public function updateChefOrderCheck($chefOrder)
    {
        return $this->chefOrderRepo->updateCheck($chefOrder);
    }

     /**
    * @param $chefOrder
    * @return 
    */
    public function updateChefOrderPaid($chefOrder)
    {
        return $this->chefOrderRepo->updatePaid($chefOrder);
    }

     /**
    * @param $datetimepeople, $cart, $rcv
    * @return 
    */
    public function updatePeopleOrder($cart, $rcv, $datetimepeople = null)
    {
        count($datetimepeople) ?: $datetimepeople = $this->datetimepeople;

        $this->dateTimePeopleRepo->updatePeople($datetimepeople, $cart, $rcv);

        return $this;
    }

    /**
    * @param $meal
    * @return 
    */
    public function updateMealPeopleEaten($meal)
    {
        return $this->mealRepo->updatePeopleEaten($meal);
    }

     /**
    * @param $cheforder
    * @return 
    */
    public function deleteChefOrder($chefOrder)
    {
        return $this->chefOrderRepo->delete($chefOrder);
    }

    /**
    * @param $cart
    * @return 
    */
    public function deleteCart($cart = null)
    {
        count($cart) ?: $cart = $this->cart;

        return $this->cartRepo->delete($cart);
    }
}