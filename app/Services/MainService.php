<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;

class MainService
{
    protected $userRepo;
    protected $chefRepo;

    /**
     * MainService constructor.
     */
    public function __construct(UserRepository $userRepo,ChefRepository $chefRepo)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;
    }

    /**
     * @return chef
     */
     public function getChef()
     {
         $user = $this->userRepo->findUserById();
         $chef = $this->userRepo->forChef($user);

         return $chef;
     }

     /**
     * @param $chef, $qty
     * @return meals
     */
     public function getMeals($chef, $qty)
     {
         return $this->chefRepo->forMeals($chef, $qty);
     }

     /**
     * @param $chef, $qty
     * @return cheforders
     */
     public function getChefOrders($chef, $qty)
     {
         return $this->chefRepo->forChefOrders($chef, $qty);
     }
}