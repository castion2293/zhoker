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
     * @param UserRepository $userRepo
     * @param ChefRepository $chefRepo
     * @param CategoryRepository $categoryRepo
     * @param MethodRepository $methodRepo
     * @param ShiftRepository $shiftRepo
     * @param MealRepository $mealRepo
     * @param DateTimePeopleRepository $datetimepeopleRepo
     * @param ImageRepository $imageRepo
     * @param \App\Services\ImageService $imageService
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
     * @param $meal
     */
     public function destroy($meal)
     {
        // $this->mealRepo->forDateTimePeopleDelete($meal);
        // $this->mealRepo->shiftDetach($meal);
        // $this->mealRepo->categoryDetach($meal);
        // $this->mealRepo->methodDetach($meal);

        $this->mealRepo->delete($meal);
     }

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
     public function updateDatetimePeople($meal, $oldDateTimePeople, $request)
     {
         $newDateTimePeopleArrays = $this->getNewDateTimePeopleArray($request);

         $this->CreateNewDateTimePeople($meal, $newDateTimePeopleArrays);

         $delete_ids = $this->getDeleteId($oldDateTimePeople, $newDateTimePeopleArrays);

         $this->deleteDateTimePeople($delete_ids);

         return $this;
     }

    /**
     * @param $meal
     * @return $this
     */
     public function findDatetimePeople($meal)
     {
        $this->datetimepeople = $this->mealRepo->forDateTimePeople($meal);

        return $this;
     }

    /**
     * @return mixed
     */
     public function getDateTimePeople()
     {
         return $this->datetimepeople;
     }

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
     * @param $meal
     * @return \App\Repositories\image
     */
     public function editImage($meal)
     {
         return $this->mealRepo->forImage($meal);
     }

    /**
     * @return \App\Category
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
     * @return array
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
     * @return \App\Method
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
     * @return array
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
     * @return \App\Shift
     */
     public function getShift()
     {
         return $this->shiftRepo->findShiftByShiftName();
     }

    /**
     * @param $meal
     * @param null $request
     * @return $this
     */
     public function connectShift($meal, $request = null)
     {
         count($request) ?: $request = $this->request;

         $this->mealRepo->shiftSync($meal, $request->shifts);

         return $this;
     }

    /**
     * @return array
     */
     public function editShift()
     {
        $shifts = $this->shiftRepo->findShiftByShiftName();
        $shiftArray = [];
        foreach($shifts as $shift) {
            $shiftArray[$shift->id] = $shift->shift;
        }

        return $shiftArray;
     }

    /**
     * @param $request
     * @return array
     */
    private function getNewDateTimePeopleArray($request)
    {
        $dtp_array = explode(";", $request->datetimepeople);

        $newDateTimePeopleArrays = [];
        for ($i = 0; $i < count($dtp_array) - 1; $i++) {
            $dpt_split_array = explode(",", $dtp_array[$i]);
            $newDateTimePeopleArrays = array_prepend($newDateTimePeopleArrays, $dpt_split_array);
        }
        return $newDateTimePeopleArrays;
    }

    /**
     * @param $meal
     * @param $newDateTimePeopleArrays
     */
    private function CreateNewDateTimePeople($meal, $newDateTimePeopleArrays)
    {
        foreach ($newDateTimePeopleArrays as $newDateTimePeopleArray) {
            if ($newDateTimePeopleArray[0] == "undefined")
                $this->datetimepeopleRepo->create($meal, $newDateTimePeopleArray);
        }
    }

    /**
     * @param $oldDateTimePeople
     * @param $newDateTimePeopleArrays
     * @return array
     */
    private function getDeleteId($oldDateTimePeople, $newDateTimePeopleArrays)
    {
        $newDateTimePeopleId = array_pluck($newDateTimePeopleArrays, 0);
        $oldDateTimepeopleId = array_pluck($oldDateTimePeople->toArray(), 'id');
        return array_diff($oldDateTimepeopleId, $newDateTimePeopleId);
    }

    /**
     * @param $delete_ids
     */
    private function deleteDateTimePeople($delete_ids)
    {
        foreach ($delete_ids as $delete_id) {
            $datetimepeople = $this->datetimepeopleRepo->findDateTimePeopleById($delete_id);

            if ($this->noOneOrder($datetimepeople))
                $this->datetimepeopleRepo->delete($datetimepeople);
        }
    }

    /**
     * @param $datetimepeople
     * @return bool
     */
    private function noOneOrder($datetimepeople)
    {
        return !count($datetimepeople->carts) || !$datetimepeople->carts->checked;
    }
}