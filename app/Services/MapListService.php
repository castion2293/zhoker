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

    protected $request;
    protected $chef;
    protected $price;
    protected $meal;
    protected $datetimepeople;
    protected $shift;
    protected $method;
    protected $category;
    
    protected $id;

    /**
     * MapListService constructor.
     * @param ChefRepository $chefRepo
     * @param CategoryRepository $categoryRepo
     * @param MethodRepository $methodRepo
     * @param ShiftRepository $shiftRepo
     * @param MealRepository $mealRepo
     * @param DateTimePeopleRepository $datetimepeopleRepo
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
     * @param $city
     * @return $this
     */
    public function findChef($city)
    {
        $this->chef = $this->chefRepo->findChefByCity($city);

        return $this;
    }

    /**
     * @param $chef
     * @return $this
     */
    public function findChefMealId($chef = null)
    {
        count($chef) ?: $chef = $this->chef;

        $chef_id = $this->ToArrayId($chef);
        $meals = $this->mealRepo->findMealByChefId($chef_id);
        $this->id = $this->ToArrayId($meals);

        return $this;
    }

    /**
     * @param $minPrice, $maxPrice
     * @return $this
     */
    public function findPrice($minPrice, $maxPrice)
    {
        if ($minPrice == "" && $maxPrice == "") {
            $this->price = $this->mealRepo->findMealAll();
        } else {
            $this->price = $this->mealRepo->findMealByPriceRange($minPrice, $maxPrice);
        }

        return $this;
    }

    /**
     * @param $price
     * @return $this
     */
    public function findPriceId($price = null)
    {
        count($price) ?: $price = $this->price;

        $this->id = $this->ToArrayId($price);

        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function findDatetimepeople($date, $people = null)
    {
        if ($people) 
            $this->datetimepeople = $this->datetimepeopleRepo->findDateTimePeopleByDateAndPeople($date, $people); 
        else
            $this->datetimepeople = $this->datetimepeopleRepo->findDateTimePeopleByDate($date);
        
        return $this;
    }

     /**
     * @param $datetimepeople
     * @return $this
     */
    public function findDatetimepeopleMealId($datetimepeople = null)
    {
        count($datetimepeople) ?: $datetimepeople = $this->datetimepeople;

        $this->id = $this->ToArrayMealId($datetimepeople);

        return $this;
    }

    /**
     * @param $shift
     * @return $this
     */
    public function findShift($shift)
    {
        $this->shift = $this->shiftRepo->findShiftByShiftName($shift);

        return $this;
    }

     /**
     * @param $shift
     * @return $this
     */
    public function findShiftMealId($shift = null)
    {
        count($shift) ?: $shift = $this->shift;
        
        if (count($shift) > 1) {
            $this->id = $this->ToMultiArrayMealID($shift);
        } else {
            $shift_meals = $this->shiftRepo->forMeals($shift);
            $this->id = $this->ToArrayId($shift_meals);
        }

        return $this;
    }

     /**
     * @param $method
     * @return $this
     */
    public function findMethod($method)
    {
        $this->method = $this->methodRepo->findMethodByMethodName($method);

        return $this;
    }

     /**
     * @param $method
     * @return $this
     */
    public function findMethodMealId($method = null)
    {
        count($method) ?: $method = $this->method;

        if (count($method) > 1) {
            $this->id = $this->ToMultiArrayMealID($method);
        } else {
            $method_meals = $this->methodRepo->forMeals($method);
            $this->id = $this->ToArrayId($method_meals);
        }

        return $this;
    }

    /**
     * @param $category
     * @return $this
     */
    public function findCategory($category)
    {
        $this->category = $this->categoryRepo->findCategoryById($category);
        
        return $this;
    }

     /**
     * @param $category
     * @return $this
     */
    public function findCategoryMealId($category = null)
    {
        count($category) ?: $category = $this->category;

        $this->id = $this->ToMultiArrayMealID($category);

        return $this;
    }

    /**
     * @param 
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * @param 
     * @return $this
     */
    public function findMeal()
    {
        $args = func_get_args();
        $object = array_pop($args);

        foreach($args as $arg) {
            $object = array_intersect($object, $arg);
        }

        $this->id = $object;

        return $this;
    }

     /**
     * @param $sort
     * @return $this
     */
    public function sortMeal($sort = '1')
    {
        if ($sort == '1') {
            $this->meal = $this->mealRepo->findMealByIdAndPriceOrder($this->id, 'asc');
        } else if($sort == '2') {
            $this->meal = $this->mealRepo->findMealByIdAndPriceOrder($this->id, 'desc');
        }

        return $this;
    }

    /**
     * @param 
     * @return $meal
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param $instances
     * @return array
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
     * @return array
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
     * @return array
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