<?php

namespace App\Repositories;

use App\Meal;
use App\Repositories\Foundation\DateTrait;

class MealRepository
{
    use DateTrait;

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
        return $this->meal->with(['images', 'datetimepeoples', 'methods', 'shifts', 'categories', 'comments'])->findOrFail($id);
     }

    /**
    * @param $id, $rank
    * @return meals
    */
    public function findMealByIdAndPriceOrder($id, $order)
    {
        return $this->meal->wherein('id', $id)->orderBy('price', $order)->with(['images', 'datetimepeoples', 'methods', 'shifts', 'categories'])->get();
    }

    /**
     * @param $chef_id
     * @return meal
     */
     public function findMealByChefId($chef_id)
     {
         return $this->meal->wherein('chef_id', $chef_id)->get();
     }

     /**
     * @param $minPrice, $maxPrice
     * @return meals
     */
     public function findMealByPriceRange($minPrice, $maxPrice)
     {
         if ($minPrice == "" && $maxPrice != "")
            return $this->meal->where('price', '<=', $maxPrice)->get();
         else if ($minPrice != "" && $maxPrice == "")
            return $this->meal->where('price', '>=', $minPrice)->get();
         else if ($minPrice != "" && $maxPrice != "")
            return $this->meal->whereBetween('price', [$minPrice, $maxPrice])->get();
     }

     /**
     * @param null
     * @return meal
     */
     public function findMealAll()
     {
         return $this->meal->all();
     }

     /**
     * @param $meal
     * @return datetimepeople
     */
     public function forDateTimePeople(Meal $meal, $others = false)
     {
        if ($others) {
            return $meal->datetimepeoples()
                        ->where('people_left', '>', 0)
                        ->where('date', '>', $this->getTodayDate())
                        ->get();
        }

        return $meal->datetimepeoples()
                    ->where('date', '>', $this->getTodayDate())
                    ->get();
     }

     /**
     * @param $meal, $id
     * @return datetimepeople
     */
     public function forDateTimePeopleById(Meal $meal, $id)
     {
         return $meal->datetimepeoples()->findOrFail($id);
     }

     /**
     * @param $meal
     * @return image
     */
     public function forImage(Meal $meal)
     {
         return $meal->images()->get();
     }

     /**
     * @param $meal
     * @return method
     */
     public function forMethod(Meal $meal)
     {
         return $meal->methods()->get();
     }

     /**
     * @param $meal, $id
     * @return method
     */
     public function forMethodById(Meal $meal, $id)
     {
         return $meal->methods()->findorFail($id);
     }

     public function save(Meal $meal)
     {
         return $meal->save();
     }

     public function imageSync(Meal $meal, $images)
     {
         return $meal->images()->sync($images);
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

     /**
     * @param $meal
     * @return 
     */
    public function updatePeopleEaten(Meal $meal)
    {
        return $meal->increment('people_eaten' );
    }

     /**
     * @param $meal, $score
     * @return 
     */
     public function updateEvaluate(Meal $meal, $score)
     {
         return $meal->update([
             'people_eva' => $meal->people_eva++,
             'evaluation' => $meal->evaluation + $score,
         ]);
     }

     public function delete(Meal $meal)
     {
         return $meal->delete();
     }
}