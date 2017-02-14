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
             return $chef->meals()->latest('updated_at')->take($qty)->with('images')->get();
         } else {
             return $chef->meals()->latest('updated_at')->with('images')->get();
         }
     }

     /**
     * @param $chef
     * @return meals
     */
     public function forMealsPaginate(Chef $chef, $qty)
     {
         return $chef->meals()->latest('updated_at')->with(['methods', 'images'])->paginate($qty);
     }

     /**
     * @param $chef
     * @return cheforder
     */
     public function forChefOrders(Chef $chef, $filter = null, $qty = null)
     {
         if ($qty) {
             return $chef->cheforders()->withTrashed()->latest('id')->take($qty)->with('carts')->get();
         } else {
             return $filter->apply($chef->cheforders()->newQuery())->get();
         }
     }

     /**
     * @param $chef
     * @return cheforder
     */
    //  public function forChefOrdersPaginate(Chef $chef, $filter, $qty = null)
    //  {
    //      return $filter->apply($chef->cheforders()->newQuery())->paginate($qty);
    //  }

     /**
     * @param $chef
     * @return images
     */
     public function forImages(Chef $chef)
     {
         return $chef->images()->latest('updated_at')->get();
     }

    /**
     * @param $chef
     * @return images
     */
     public function forImagesPaginate(Chef $chef, $qty)
     {
         return $chef->images()->latest('updated_at')->paginate($qty);
     }

     public function save(Chef $chef)
     {
         return $chef->save();
     }
}