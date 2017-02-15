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
    * @param $chef
    * @return $this
    */
    public function findUserByChef($chef = null)
    {
        count($chef) ?: $chef = $this->chef;

        $this->user = $this->chefRepo->forUser($chef);

        return $this;
    }

    /**
    * @param $cart
    * @return user
    */
    public function findUserByCart($cart)
    {
        count($cart) ?: $cart = $this->cart;

        $this->user = $this->cartRepo->forUser($cart);

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
    public function findChef($id)
    {
        $this->chef = $this->chefRepo->findChefById($id);

        return $this;
    }

     /**
    * @param $chefOrder
    * @return $this
    */
    public function findChefByChefOrder($chefOrder = null)
    {
        count($chefOrder) ?: $chefOrder = $this->chefOrder;

        $this->chef = $this->chefOrderRepo->forChef($chefOrder);

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
    public function findUserOrderByUser($filter = null, $qty = null, $user = null)
    {
        count($user) ?: $user = $this->user;

        $this->userOrder = $this->userRepo->forUserOrder($user, $filter);
        
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
    * @return this
    */
    public function findChefOrderById($id)
    {
        $this->chefOrder = $this->chefOrderRepo->findChefOrderById($id);

        return $this;
    }

     /**
    * @param $cart
    * @return this
    */
    public function findChefOrderByCart($cart)
    {
        count($cart) ?: $cart = $this->cart;

        $this->chefOrder = $this->cartRepo->forChefOrder($cart);

        return $this;
    }

    /**
    * @param $qty, $pagi, $chef
    * @return $this
    */
    public function findChefOrder($filter = null, $qty = null,  $chef = null)
    {
        count($chef) ?: $chef = $this->chef;
    
        $this->chefOrder = $this->chefRepo->forChefOrders($chef, $filter);

        return $this;
    }

    /**
    * @param 
    * @return $chef
    */
    public function getChefOrder()
    {
        return $this->chefOrder;
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