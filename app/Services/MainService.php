<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;

class MainService
{
    protected $userRepo;
    protected $chefRepo;

    protected $user;
    protected $chef;
    protected $meal;
    protected $chefOrder;

    /**
     * MainService constructor.
     */
    public function __construct(UserRepository $userRepo,ChefRepository $chefRepo)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;
    }

    /**
     * @param 
     * @return $this
     */
    public function findUser()
    {
        $this->user = $this->userRepo->findUserById();

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
    public function findChef($user = null)
    {
        count($user) ?: $user = $this->user;

        $this->chef = $this->userRepo->forChef($user);
        
        return $this;
    }

    /**
     * @return chef
     */
     public function getChef()
     {
         return $this->chef;
     }

     /**
     * @param $chef, $qty
     * @return $this
     */
     public function findMeals($chef = null, $qty)
     {
         count($chef) ?: $chef = $this->chef;
         
         $this->meal = $this->chefRepo->forMeals($chef, $qty);

         return $this;
     }

     /**
     * @param 
     * @return meals
     */
     public function getMeals()
     {
         return $this->meal;
     }

     /**
     * @param $chef, $qty
     * @return $this
     */
     public function findChefOrders($chef = null, $qty)
     {
        count($chef) ?: $chef = $this->chef;

        $this->chefOrder = $this->chefRepo->forChefOrders($chef, null, $qty);

        return $this;
     }

     /**
     * @param 
     * @return cheforders
     */
     public function getChefOrders()
     {
         return $this->chefOrder;
     }
}