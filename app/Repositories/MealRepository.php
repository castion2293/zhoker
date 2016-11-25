<?php

namespace App\Repositories;

use App\Meal;

class MealRepository
{
    protected $meal;

    /**
     * MealRepository constructor.
     * @param Meal $meal
     */
    public function __construct(Meal $meal)
    {
        $this->meal = $meal;
    }

    /**
     * @return meal
     */
     public function NewMeal()
     {
        return new Meal();
     }

    /**
     * @param $id
     * @return meal
     */
     public function findMealById($id)
     {
        return $this->meal->findOrFail($id);
     }

     /**
     * @param $meal
     * @return datetimepeople
     */
     public function forDateTimePeople(Meal $meal)
     {
        return $meal->datetimepeoples()->get();
     }

     /**
     * @param $meal
     * @return 
     */
     public function forDateTimePeopleDelete(Meal $meal)
     {
         return $meal->datetimepeoples()->delete();
     }

     public function save(Meal $meal)
     {
         return $meal->save();
     }

     public function shiftSync(Meal $meal, $shitfs)
     {
         return $meal->shifts()->sync($shitfs);
     }

     public function categorySync(Meal $meal, $categories)
     {
         return $meal->categories()->sync($categories);
     }

     public function methodSync(Meal $meal, $methods)
     {
         return $meal->methods()->sync($methods);
     }

     public function shiftDetach(Meal $meal)
     {
         return $meal->shifts()->detach();
     }

     public function categoryDetach(Meal $meal)
     {
         return $meal->categories()->detach();
     }

     public function methodDetach(Meal $meal)
     {
         return $meal->methods()->detach();
     }

     public function delete(Meal $meal)
     {
         return $meal->delete();
     }
}