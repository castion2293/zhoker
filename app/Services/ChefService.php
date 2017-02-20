<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MethodRepository;
use App\Repositories\ShiftRepository;
use App\Repositories\MealRepository;
use App\Repositories\DateTimePeopleRepository;
use App\Repositories\ImageRepository;

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
    protected $imageRepo;
    protected $imageService;

    protected $user;
    protected $chef;
    protected $meal;
    protected $datetimepeople;
    protected $request;

    /**
     * ChefService constructor.
     */
    public function __construct(UserRepository $userRepo, ChefRepository $chefRepo, CategoryRepository $categoryRepo, MethodRepository $methodRepo, ShiftRepository $shiftRepo,
                               MealRepository $mealRepo, DateTimePeopleRepository $datetimepeopleRepo, ImageRepository $imageRepo, ImageService $imageService)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;
        $this->categoryRepo = $categoryRepo;
        $this->methodRepo = $methodRepo;
        $this->shiftRepo = $shiftRepo;
        $this->mealRepo = $mealRepo;
        $this->datetimepeopleRepo = $datetimepeopleRepo;
        $this->imageRepo = $imageRepo;

        $this->imageService = $imageService;
    }

     /**
     * @param $id
     * @return 
     */
     public function destroy($meal)
     {
        // $this->mealRepo->forDateTimePeopleDelete($meal);
        // $this->mealRepo->shiftDetach($meal);
        // $this->mealRepo->categoryDetach($meal);
        // $this->mealRepo->methodDetach($meal);

        $this->mealRepo->delete($meal);
     }


     //New version
     /**
     * @return $this
     */
     public function findUser()
     {
         $this->user = $this->userRepo->findUserById();

         return $this;
     }

     /**
     * $user
     * @return $this
     */
     public function findChef($user = null)
     {
         count($user) ?: $user = $this->user;

         $this->chef = $this->userRepo->forChef($user);

         return $this;
     }

     /**
     * 
     * @return $chef
     */
     public function getChef()
     {
         return $this->chef;
     }

     /**
     * $chef, $qty
     * @return $this
     */
     public function findMeals($qty, $chef = null)
     {
         count($chef) ?: $chef = $this->chef;

         $this->meal = $this->chefRepo->forMealsPaginate($chef, $qty);

         return $this;
     }

     /**
     * @param $id
     * @return $this
     */
     public function findMeal($id)
     {
         $this->meal = $this->mealRepo->findMealById($id);

         return $this;
     }

     /**
     * 
     * @return $this
     */
     public function createMeal($request)
     {
         $this->request = $request;

         $meal = $this->mealRepo->NewMeal();
        
         $meal->chef_id = $this->userRepo->findUserById()->chef_id;
         $meal->name = $this->request->name;
         $meal->price = $this->request->price;
         $meal->description = Purifier::clean($this->request->description);
         $meal->cover_img_id = $request->cover_img;
         $meal->cover_img = $this->imageService->findImageById($request->cover_img)->getImage()->image_path;

         $this->mealRepo->save($meal);

         $this->meal = $meal;

         return $this;
     }

     /**
     * 
     * @return $this
     */
     public function updateMeal($meal, $request)
     {
          $this->request = $request;

          $meal->name = $this->request->name;
          $meal->price = $this->request->price;
          $meal->description = Purifier::clean($this->request->description);
          $meal->cover_img_id = $request->cover_img;
          $meal->cover_img = $this->imageService->findImageById($request->cover_img)->getImage()->image_path;

          $this->mealRepo->save($meal);

          $this->meal = $meal;

          return $this;
     }

     /**
     * 
     * @return $meals
     */
     public function getMeal()
     {
         return $this->meal;
     }

     /**
     * $meal, $request
     * @return $meals
     */
    //  public function createDatetimePeople($meal, $request = null)
    //  {
    //     count($request) ?: $request = $this->request;

    //     $dtp_array = explode(";", $request->datetimepeople);
        
    //     for($i=0; $i < count($dtp_array) - 1; $i++)
    //     { 
    //         $datetimepeople = $this->datetimepeopleRepo->NewDateTimePeople();
            
    //         $dpt_split_array = explode(",", $dtp_array[$i]);

    //         //$datetimepeople->meal_id = $meal->id;
    //         $datetimepeople->date = $dpt_split_array[0];
    //         $datetimepeople->time = $dpt_split_array[1];
    //         $datetimepeople->end_date = $dpt_split_array[2];
    //         $datetimepeople->end_time = $dpt_split_array[3];
    //         $datetimepeople->people_left = $dpt_split_array[4];
    //         $this->datetimepeopleRepo->mealAssociate($datetimepeople, $meal);

    //         $this->datetimepeopleRepo->save($datetimepeople);
    //     }

    //     return $this;
    //  }

     /**
     * $datetimepeople
     * @return $this
     */
    //  public function deleteDateTimePeople($datetimepeoples = null)
    //  {
    //      count($datetimepeoples) ?: $datetimepeoples = $this->datetimepeople;

    //      foreach ($datetimepeoples as $datetimepeople) {
    //         $this->datetimepeopleRepo->delete($datetimepeople);
    //      }

    //      return $this;
    //  }

     /**
     * @param $meal
     * @return datetimepeople
     */
    //  public function findDatetimePeople($meal)
    //  {
    //     $this->datetimepeople = $this->mealRepo->forDateTimePeople($meal);

    //     return $this;
    //  }

    //  public function getDateTimePeople()
    //  {
    //      return $this->datetimepeople;
    //  }

     /**
     * $meal, $request
     * @return $this
     */
     public function connectImage($meal, $request = null)
     {
        count($request) ?: $request = $this->request;

        $img_array = explode(",", $request->img);
        array_pop($img_array);

        $this->mealRepo->imageSync($meal, $img_array);

        return $this;
     }

     /**
     * $meal
     * @return $images
     */
     public function editImage($meal)
     {
         return $this->mealRepo->forImage($meal);
     }

     /**
     * @return category
     */
     public function getCategory()
     {
         return $this->categoryRepo->findCategoryById();
     }

     /**
     * $meal, $request
     * @return $this
     */
     public function connectCategory($meal, $request = null)
     {
         count($request) ?: $request = $this->request;

         $this->mealRepo->categorySync($meal, $request->categories);

         return $this;
     }

     /**
     * @return category
     */
     public function editCategory()
     {
        $categories = $this->categoryRepo->findCategoryById();
        $categoryarray = [];
        foreach($categories as $category) {
            $categoryarray[$category->id] = $category->category;
        }

        return $categoryarray;
     }

     /**
     * @return method
     */
     public function getMethod()
     {
         return $this->methodRepo->findMethodByMethodName();
     }

     /**
     * $meal, $request
     * @return $this
     */
     public function connectMethod($meal, $request = null)
     {
         count($request) ?: $request = $this->request;

         $this->mealRepo->methodSync($meal, $request->methods);

         return $this;
     }

     /**
     * @return method
     */
     public function editMethod()
     {
        $methods = $this->methodRepo->findMethodByMethodName();
        $methodarray = [];
        foreach($methods as $method) {
            $methodarray[$method->id] = $method->method;
        }

        return $methodarray;
     }

     /**
     * @return shift
     */
     public function getShift()
     {
         return $this->shiftRepo->findShiftByShiftName();
     }

     /**
     * $meal, $request
     * @return $this
     */
     public function connectShift($meal, $request = null)
     {
         count($request) ?: $request = $this->request;

         $this->mealRepo->shiftSync($meal, $request->shifts);

         return $this;
     }

      /**
     * @return shift
     */
     public function editShift()
     {
        $shifts = $this->shiftRepo->findShiftByShiftName();
        $shiftarray = [];
        foreach($shifts as $shift) {
            $shiftarray[$shift->id] = $shift->shift;
        }

        return $shiftarray;
     }
}