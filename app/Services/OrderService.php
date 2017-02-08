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
    * @return user
    */
    public function getUser($id)
    {
        return $this->userRepo->findUserById($id);
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
    * @return chef
    */
    public function getChef($id)
    {
        return $this->chefRepo->findChefById($id);
    }

    /**
    * @param $cheforder
    * @return cart
    */
    public function getCart($chefOrder)
    {
        return $this->chefOrderRepo->forCart($chefOrder);
    }

     /**
    * @param $user
    * @return userOrder
    */
    public function getUserOrderByUser($user, $qty = null)
    {
        return $this->userRepo->forUserOrder($user, $qty);
    }

     /**
    * @param $cart
    * @return userOrder
    */
    public function getUserOrderByCart($cart)
    {
        return $this->cartRepo->forUserOrder($cart);
    }

     /**
    * @param $id
    * @return cheforder
    */
    public function getChefOrderById($id)
    {
        return $this->chefOrderRepo->findChefOrderById($id);
    }

     /**
    * @param $chef
    * @return cheforder
    */
    public function getChefOrder($chef, $qty)
    {
        return $this->chefRepo->forChefOrdersPaginate($chef, $qty);
    }

     /**
    * @param $chef
    * @return cheforder
    */
    public function getChefOrderAll($chef)
    {
        return $this->chefRepo->forChefOrders($chef);
    }

     /**
    * @param $cart
    * @return datetimepeople
    */
    public function getDateTimePeopleByCart($cart)
    {
        return $this->cartRepo->forDateTimePeople($cart);
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
    public function updatePeopleOrder($datetimepeople, $cart, $rcv)
    {
        return $this->dateTimePeopleRepo->updatePeople($datetimepeople, $cart, $rcv);
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
    public function deleteCart($cart)
    {
        return $this->cartRepo->delete($cart);
    }
}