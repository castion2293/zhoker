<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MethodRepository;
use App\Repositories\ShiftRepository;
use App\Repositories\MealRepository;
use App\Repositories\DateTimePeopleRepository;

use App\Services\ImageService;

use Purifier;

class ChefService
{
    protected $userRepo;
    protected $chefRepo;
    protected $categoryRepo;
    protected $methodRepo;
    protected $shiftRepo;
    protected $mealRepo;
    protected $datetimepeopleRepo;

    protected $imageService;

    /**
     * ChefService constructor.
     */
    public function __construct(UserRepository $userRepo, ChefRepository $chefRepo, CategoryRepository $categoryRepo, MethodRepository $methodRepo, ShiftRepository $shiftRepo,
                               MealRepository $mealRepo, DateTimePeopleRepository $datetimepeopleRepo, ImageService $imageService)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;
        $this->categoryRepo = $categoryRepo;
        $this->methodRepo = $methodRepo;
        $this->shiftRepo = $shiftRepo;
        $this->mealRepo = $mealRepo;
        $this->datetimepeopleRepo = $datetimepeopleRepo;

        $this->imageService = $imageService;
    }

    /**
     * @return meal
     */
     public function index()
     {
         $user = $this->userRepo->findUserById();
         $chef = $this->userRepo->forChef($user);
         $meals = $this->chefRepo->forMealsPaginate($chef, 6);

         return $meals;
     }

     /**
     * @return category
     */
     public function createCategory()
     {
         return $this->categoryRepo->findCategoryAll();
     }

     /**
     * @return method
     */
     public function createMethod()
     {
         return $this->methodRepo->findMethodAll();
     }

     /**
     * @return shift
     */
     public function createShift()
     {
         return $this->shiftRepo->findShiftAll();
     }

     /**
     * @param $request
     * @return meal
     */
     public function store($request)
     {
        $meal = $this->mealRepo->NewMeal();
        
        $meal->chef_id = $this->userRepo->getChef_id();
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = Purifier::clean($request->input('description'));

        // save the image
        if ($request->hasFile('img')) {
            $meal->img_path = $this->imageService->save($request->file('img'));
        }

        $this->mealRepo->save($meal);

        $dtp_array = explode(";", $request->datetimepeople);
        
        for($i=0; $i < count($dtp_array) - 1; $i++)
        { 
            $datetimepeople = $this->datetimepeopleRepo->NewDateTimePeople();
            
            $dpt_split_array = explode(",", $dtp_array[$i]);

            $datetimepeople->date = $dpt_split_array[0];
            $datetimepeople->time = $dpt_split_array[1];
            $datetimepeople->people_left = $dpt_split_array[2];
            $this->datetimepeopleRepo->mealAssociate($datetimepeople, $meal);

            $this->datetimepeopleRepo->save($datetimepeople);
            
        }
        
        $this->mealRepo->shiftSync($meal, $request->shifts);
        $this->mealRepo->categorySync($meal, $request->categories);
        $this->mealRepo->methodSync($meal, $request->methods);

        return $meal;
     }

     /**
     * @param $id
     * @return meal
     */
     public function show($id)
     {
         return $this->mealRepo->findMealById($id);
     }

     /**
     * @param $id
     * @return meal
     */
     public function editMeal($id)
     {
         return $this->mealRepo->findMealById($id);
     }

     /**
     * @param $meal
     * @return datetimepeople
     */
     public function editDatetimePeople($meal)
     {
         $datetimepeoples = $this->mealRepo->forDateTimePeople($meal);

         $old_datetimepeople = "";
         foreach ($datetimepeoples as $datetimepeople) {
             $old_datetimepeople .= $datetimepeople->date . ',' . $datetimepeople->time . ',' . $datetimepeople->people_left . ';';
         }

         return $old_datetimepeople;
     }

     /**
     * @return shift
     */
     public function editShift()
     {
        $shifts = $this->shiftRepo->findShiftAll();
        $shiftarray = [];
        foreach($shifts as $shift) {
            $shiftarray[$shift->id] = $shift->shift;
        }

        return $shiftarray;
     }

     /**
     * @return category
     */
     public function editCategory()
     {
        $categories = $this->categoryRepo->findCategoryAll();
        $categoryarray = [];
        foreach($categories as $category) {
            $categoryarray[$category->id] = $category->category;
        }

        return $categoryarray;
     }

     /**
     * @return method
     */
     public function editMethod()
     {
        $methods = $this->methodRepo->findMethodAll();
        $methodarray = [];
        foreach($methods as $method) {
            $methodarray[$method->id] = $method->method;
        }

        return $methodarray;
     }

     /**
     * @param $request
     * @return meal
     */
     public function update($request, $id)
     {
        $meal = $this->mealRepo->findMealById($id);

        $this->mealRepo->forDateTimePeopleDelete($meal);

        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = Purifier::clean($request->input('description'));

        if ($request->hasFile('img')) {
            $meal->img_path = $this->imageService->update($request->file('img'), $meal->img_padth);
        }

        $this->mealRepo->save($meal);

        $dtp_array = explode(";", $request->datetimepeople);
        
        for($i=0; $i < count($dtp_array) - 1; $i++)
        {
            $datetimepeople = $this->datetimepeopleRepo->NewDateTimePeople();
            
            $dpt_split_array = explode(",", $dtp_array[$i]);

            $datetimepeople->date = $dpt_split_array[0];
            $datetimepeople->time = $dpt_split_array[1];
            $datetimepeople->people_left = $dpt_split_array[2];
            $this->datetimepeopleRepo->mealAssociate($datetimepeople, $meal);

            $this->datetimepeopleRepo->save($datetimepeople);
        }

        $this->mealRepo->shiftSync($meal, $request->shifts);
        $this->mealRepo->categorySync($meal, $request->categories);
        $this->mealRepo->methodSync($meal, $request->methods);

        return $meal;
     }

     /**
     * @param $id
     * @return 
     */
     public function destroy($id)
     {
        $meal = $this->mealRepo->findMealById($id);

        $this->mealRepo->forDateTimePeopleDelete($meal);
        $this->mealRepo->shiftDetach($meal);
        $this->mealRepo->categoryDetach($meal);
        $this->mealRepo->methodDetach($meal);

        $this->imageService->delete($meal->img_path);
        
        $this->mealRepo->delete($meal);
     }
}