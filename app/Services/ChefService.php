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
         return $this->categoryRepo->findCategoryById();
     }

     /**
     * @return method
     */
     public function createMethod()
     {
         return $this->methodRepo->findMethodByMethodName();
     }

     /**
     * @return shift
     */
     public function createShift()
     {
         return $this->shiftRepo->findShiftByShiftName();
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

        $this->mealRepo->save($meal);

        // save the image
        $files = $request->file('file');

        $count = 0;//counter
        foreach($files as $file) {

            $image_path = $this->imageService->save($file, '/images/', $count, 'resize'); //resize imgage
            $ori_image_path = $this->imageService->save($file, '/images/', $count, 'original'); //original imgage
           
            $meal->images()->create([
                'image_path' => $image_path,
                'ori_image_path' => $ori_image_path,
            ]);

            $count++;
        }

        $dtp_array = explode(";", $request->datetimepeople);
        
        for($i=0; $i < count($dtp_array) - 1; $i++)
        { 
            $datetimepeople = $this->datetimepeopleRepo->NewDateTimePeople();
            
            $dpt_split_array = explode(",", $dtp_array[$i]);

            $datetimepeople->date = $dpt_split_array[0];
            $datetimepeople->time = $dpt_split_array[1];
            $datetimepeople->end_date = $dpt_split_array[2];
            $datetimepeople->end_time = $dpt_split_array[3];
            $datetimepeople->people_left = $dpt_split_array[4];
            $this->datetimepeopleRepo->mealAssociate($datetimepeople, $meal);

            $this->datetimepeopleRepo->save($datetimepeople);
            
        }

        $this->mealRepo->shiftSync($meal, explode(",", $request->shifts));
        $this->mealRepo->categorySync($meal, explode(",", $request->categories));
        $this->mealRepo->methodSync($meal, explode(",", $request->methods));

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
        return $this->mealRepo->forDateTimePeople($meal);
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
     * @param $request
     * @return meal
     */
     public function update($request, $id)
     {
        $meal = $this->mealRepo->findMealById($id);

        $datetimepeoples = $this->mealRepo->forDateTimePeople($meal);

        foreach ($datetimepeoples as $datetimepeople) {
            $this->datetimepeopleRepo->delete($datetimepeople);
        }

        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = Purifier::clean($request->input('description'));

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
     public function destroy($meal)
     {
        // $this->mealRepo->forDateTimePeopleDelete($meal);
        // $this->mealRepo->shiftDetach($meal);
        // $this->mealRepo->categoryDetach($meal);
        // $this->mealRepo->methodDetach($meal);

        $this->mealRepo->delete($meal);
     }

      /**
     * @param $request $meal
     * @return 
     */
     public function uploadImage($request, $meal)
     {
         $files =$request->file('file');

         $count = 0;//counter
         foreach($files as $file) {
             
            $filename = $this->imageService->save($file, '/images/', $count);
        
            $meal->images()->create([
                'image_path' => $filename,
            ]);

            $count++;
         }
     }

      /**
     * @param $image_id
     * @return 
     */
     public function deleteImage($image_id)
     {
         $image = $this->imageRepo->findImageById($image_id);

         $this->imageService->delete($image->image_path);

         $this->imageRepo->delete($image);
     }
}