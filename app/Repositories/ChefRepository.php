<?php

namespace App\Repositories;

use Auth;
use App\Chef;

class ChefRepository 
{
    protected $chef;

    /**
     * ChefRepository constructor.
     * @param Chef $chef
     */
    public function __construct(Chef $chef)
    {
        $this->chef = $chef;
    }

    /**
     * @return chef_id
     */
     public function getChef_id()
     {
        return Auth::user()->chef_id;
     }

     /**
     * @return chef
     */
     public function getChef($id = null)
     {
         if ($id)
            return $this->chef->findOrFail($id);
         else
            return Auth::user()->chefs()->first();
     }

     /**
     * @param $id
     * @return meals
     */
     public function getChefMeals($id)
     {
         return $this->chef->findOrFail($id)->meals();
     }
}