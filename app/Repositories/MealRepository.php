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
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
     public function findMealById($id)
     {
        return $this->meal->with(['images', 'datetimepeoples', 'methods', 'shifts', 'categories', 'comments'])->find($id);
     }

    /**
     * @param $id
     * @param $order
     * @return mixed
     */
    public function findMealByIdAndPriceOrder($id, $order)
    {
        return $this->meal->whereIn('id', $id)->orderBy('price', $order)->with(['images', 'datetimepeoples', 'methods', 'shifts', 'categories'])->get();
    }

    /**
     * @param $chef_id
     * @return meal
     */
     public function findMealByChefId($chef_id)
     {
         return $this->meal->whereIn('chef_id', $chef_id)->get();
     }

    /**
     * @param $minPrice
     * @param $maxPrice
     * @return mixed
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
     public function findMealAll()
     {
         return $this->meal->all();
     }

    /**
     * @param Meal $meal
     * @param bool $others
     * @return mixed
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
     * @param Meal $meal
     * @param $id
     * @return mixed
     */
     public function forDateTimePeopleById(Meal $meal, $id)
     {
         return $meal->datetimepeoples()->find($id);
     }

    /**
     * @param Meal $meal
     * @return \Illuminate\Database\Eloquent\Collection
     */
     public function forImage(Meal $meal)
     {
         return $meal->images()->get();
     }

    /**
     * @param Meal $meal
     * @return \Illuminate\Database\Eloquent\Collection
     */
     public function forMethod(Meal $meal)
     {
         return $meal->methods()->get();
     }

    /**
     * @param Meal $meal
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
     public function forMethodById(Meal $meal, $id)
     {
         return $meal->methods()->findorFail($id);
     }

    /**
     * @param Meal $meal
     * @return bool
     */
     public function save(Meal $meal)
     {
         return $meal->save();
     }

    /**
     * @param Meal $meal
     * @param $images
     * @return array
     */
     public function imageSync(Meal $meal, $images)
     {
         return $meal->images()->sync($images);
     }

    /**
     * @param Meal $meal
     * @param $shitfs
     * @return array
     */
     public function shiftSync(Meal $meal, $shitfs)
     {
         return $meal->shifts()->sync($shitfs);
     }

    /**
     * @param Meal $meal
     * @param $categories
     * @return array
     */
     public function categorySync(Meal $meal, $categories)
     {
         return $meal->categories()->sync($categories);
     }

    /**
     * @param Meal $meal
     * @param $methods
     * @return array
     */
     public function methodSync(Meal $meal, $methods)
     {
         return $meal->methods()->sync($methods);
     }

    /**
     * @param Meal $meal
     * @return int
     */
     public function shiftDetach(Meal $meal)
     {
         return $meal->shifts()->detach();
     }

    /**
     * @param Meal $meal
     * @return int
     */
     public function categoryDetach(Meal $meal)
     {
         return $meal->categories()->detach();
     }

    /**
     * @param Meal $meal
     * @return int
     */
     public function methodDetach(Meal $meal)
     {
         return $meal->methods()->detach();
     }

    /**
     * @param Meal $meal
     * @return int
     */
    public function updatePeopleEaten(Meal $meal)
    {
        return $meal->increment('people_eaten' );
    }

    /**
     * @param Meal $meal
     * @param $score
     * @return bool
     */
     public function updateEvaluate(Meal $meal, $score)
     {
         return $meal->update([
             'people_eva' => $meal->people_eva++,
             'evaluation' => $meal->evaluation + $score,
         ]);
     }

    /**
     * @param Meal $meal
     * @return bool|null
     */
     public function delete(Meal $meal)
     {
         return $meal->delete();
     }
}