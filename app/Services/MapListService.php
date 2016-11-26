<?php

namespace App\Services;

use App\Repositories\ChefRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MethodRepository;
use App\Repositories\ShiftRepository;
use App\Repositories\MealRepository;
use App\Repositories\DateTimePeopleRepository;

class MapListService
{
    protected $chefRepo;
    protected $categoryRepo;
    protected $methodRepo;
    protected $shiftRepo;
    protected $mealRepo;
    protected $datetimepeopleRepo;

    /**
     * MapListService constructor.
     */
    public function __construct(ChefRepository $chefRepo, CategoryRepository $categoryRepo, MethodRepository $methodRepo, ShiftRepository $shiftRepo,
                               MealRepository $mealRepo, DateTimePeopleRepository $datetimepeopleRepo)
    {
        $this->chefRepo = $chefRepo;
        $this->categoryRepo = $categoryRepo;
        $this->methodRepo = $methodRepo;
        $this->shiftRepo = $shiftRepo;
        $this->mealRepo = $mealRepo;
        $this->datetimepeopleRepo = $datetimepeopleRepo;
    }

    /**
     * @param $request
     * @return meals
     */
    public function mapList($request)
    {
        $chefs = $this->chefRepo->findChefByCity($request->input('city'));
        $shifts = $this->shiftRepo->findShiftByShiftName($request->input('shift'));
        $datetimepeoples = $this->datetimepeopleRepo->findDateTimePeopleByDate($request->input('date'));

        //find chef_meal_id
        $chef_id = $this->ToArrayId($chefs);
        
        $meals = $this->mealRepo->findMealByChefId($chef_id);

        $chef_meal_id = $this->ToArrayId($meals);
        
        //find shift_meal_id
        $meals = $this->shiftRepo->forMeals($shifts);
        
        $shift_meal_id = $this->ToArrayId($meals);

        //find date_meal_id
        $date_meal_id = $this->ToArrayMealId($datetimepeoples);
        
        //find Meals
        $meal_id = array_intersect($chef_meal_id, $shift_meal_id, $date_meal_id);
        return $this->mealRepo->findMealById($meal_id);
    }

    /**
     * @param $request
     * @return meals
     */
    public function mapListDetail($request)
    {
        $chefs = $this->chefRepo->findChefByCity($request->input('city'));

        if ($request->input('minPrice') == "" && $request->input('maxPrice') == "") {
            $meals = Meal::all();
        } else {
            $meals = $this->mealRepo->findMealByPriceRange($request->input('minPrice'), $request->input('maxPrice'));
        }

        $datetimepeoples = $this->datetimepeopleRepo->findDateTimePeopleByDateAndPeople($request->input('date'), $request->input('people'));

        if ($request->input('shift') == 'All') {
            $shifts = $this->shiftRepo->findShiftAll();
        } else {
            $shifts = $this->shiftRepo->findShiftByShiftName($request->input('shift'));
        }
        
        if ($request->input('method') == 'All') {
            $methods = $this->methodRepo->findMethodAll();
        } else {
            $methods = $this->methodRepo->findMethodByMethodName($request->input('method'));
        }

        if ($request->input('type') == null) {
            $categories = $this->categoryRepo->findCategoryAll();
        } else {
            $categories = $this->categoryRepo->findCategoryById($request->input('type'));
        }
        
        //find chef_meal_id
        $chef_id = $this->ToArrayId($chefs);
        
        $chef_meals = $this->mealRepo->findMealByChefId($chef_id);

        $chef_meal_id = $this->ToArrayId($chef_meals);

        //find meal_meal_id
        $meal_meal_id = $this->ToArrayId($meals);
        
        //find date_meal_id
        $date_meal_id = $this->ToArrayMealId($datetimepeoples);
        
        //find shift_meal_id
        if ($request->input('shift') == 'All') {
            $shift_meal_id = $this->ToMultiArrayMealID($shifts);
        } else {
            $shift_meals = $this->shiftRepo->forMeals($shifts);
        
            $shift_meal_id = $this->ToArrayId($shift_meals);
        }

        //find Method_meal_id
        if ($request->input('method') == 'All') {
            $method_meal_id = $this->ToMultiArrayMealID($methods);
        } else {
            $method_meals = $this->methodRepo->forMeals($methods);
        
            $method_meal_id = $this->ToArrayId($method_meals);
        }
        //find Category_meal_id
        $category_meal_id = $this->ToMultiArrayMealID($categories);

        //find searching meal id
        $meal_id = array_intersect($chef_meal_id, $meal_meal_id, $date_meal_id, $shift_meal_id, $method_meal_id, $category_meal_id);

        if ($request->input('sort') == "1") {
            $meals = $this->mealRepo->findMealByIdAndPriceOrder($meal_id, 'asc');
        } else if($request->input('sort') == "2") {
            $meals = $this->mealRepo->findMealByIdAndPriceOrder($meal_id, 'desc');
        }

        return $meals;
    }

    /**
     * @param $instances
     * @return $arrayId
     */
    private function ToArrayId($instances)
    {
        $arrayId = [];
        $i = 0;
        foreach ($instances as $instance) {
            $arrayId[$i] = $instance->id;
            $i++;
        }

        return $arrayId;
    }

    /**
     * @param $instances
     * @return $arrayId
     */
    private function ToArrayMealId($instances)
    {
        $arrayId = [];
        $i = 0;
        foreach ($instances as $instance) {
            $arrayId[$i] = $instance->meal_id;
            $i++;
        }

        return $arrayId;
    }

    /**
     * @param $instances
     * @return $array_unique
     */
    private function ToMultiArrayMealID($instances)
    {
        $array_meal_ids = [];
        $i = 0;
        foreach ($instances as $instance) {
            $array_meals = $instance->meals()->get();
            $array_meal_ids[$i] = $this->ToArrayId($array_meals);
            $i++;
        }

        return array_unique(array_flatten($array_meal_ids));
    }
}