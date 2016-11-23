<?php

namespace App\Services;

use App\Repositories\ChefRepository;

class ChefCRUDService
{
    protected $chefRepository; /** @var  ChefRepository 注入的ChefRepository */

    /**
     * AgentService constructor.
     * @param ChefRepository $chefRepository;
     */
    public function __construct(ChefRepository $chefRepository)
    {
        $this->chefRepository = $chefRepository;
    }

    /**
     * @param $id
     * return chef
     * @return 
     */
     public function getChef($id = null)
     {
         return $this->chefRepository->getChef($id);
     }

    /**
     * return meals collection
     *
     * @return 
     */
     public function getChefMeals($qty = null)
     {
         $chef_id = $this->chefRepository->getChef_id();

         if ($qty)
            return $this->chefRepository->getChefMeals($chef_id)->orderBy('updated_at', 'desc')->take($qty)->get();
         else
            return $this->chefRepository->getChefMeals($chef_id)->orderBy('updated_at', 'desc')->get();
     }

     /**
     * return meals collection
     *
     * @return 
     */
     public function getChefMealsPaginate($qty)
     {
         $chef_id = $this->chefRepository->getChef_id();

         return $this->chefRepository->getChefMeals($chef_id)->paginate($qty);
     }
}