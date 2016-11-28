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
     * @param $id
     * @return chef
     */
     public function findChefById($id)
     {
        return $this->chef->findOrFail($id);
     }

     /**
     * @param $city
     * @return chef
     */
     public function findChefByCity($city)
     {
         return $this->chef->where('city', $city)->get();
     }

     /**
     * @param $chef
     * @return user
     */
     public function forUser(Chef $chef)
     {
         return $chef->users()->first();
     }

     /**
     * @param $chef
     * @return meals
     */
     public function forMeals(Chef $chef, $qty = null)
     {
         if ($qty) {
             return $chef->meals()->orderBy('updated_at', 'desc')->take($qty)->get();
         } else {
             return $chef->meals()->orderBy('updated_at', 'desc')->get();
         }
     }

     /**
     * @param $chef
     * @return meals
     */
     public function forMealsPaginate(Chef $chef, $qty)
     {
         return $chef->meals()->orderBy('updated_at', 'desc')->paginate($qty);
     }

     /**
     * @param $chef
     * @return meals
     */
     public function forChefOrders(Chef $chef, $qty = null)
     {
         if ($qty) {
             return $chef->cheforders()->orderBy('id', 'desc')->take($qty)->get();
         } else {
             return $chef->cheforders()->orderBy('updated_at', 'desc')->get();
         }
     }

     public function save(Chef $chef)
     {
         return $chef->save();
     }
}