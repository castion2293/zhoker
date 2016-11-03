<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MapListRequest;

use App\Chef;
use App\Meal;
use App\DateTimePeople;
use App\Shift;
use App\Method;
use App\Category;

class MapListController extends Controller
{
    public function postMaplist(MapListRequest $request)
    {
        $city = $request->input('city');
        $shift_time = $request->input('shift');
        $date = $request->input('date');

        $chefs = Chef::where('city', $city)->get();
        $shifts = Shift::where('shift', $shift_time)->first();
        $datetimepeoples = DateTimePeople::where('date', $date)->get();

        //find chef_meal_id
        $chef_id = $this->ToArrayId($chefs);
        
        $meals = Meal::wherein('chef_id', $chef_id)->get();

        $chef_meal_id = $this->ToArrayId($meals);
        
        //find shift_meal_id
        $meals = $shifts->meals()->get();
        
        $shift_meal_id = $this->ToArrayId($meals);

        //find date_meal_id
        $date_meal_id = $this->ToArrayMealId($datetimepeoples);
        
        //find Meals
        $meal_id = array_intersect($chef_meal_id, $shift_meal_id, $date_meal_id);

        $meals = Meal::find($meal_id);
        
        return view('desktop.main.map_list', ['meals' => $meals, 'date' => $date]);
    }

    public function postMaplistDetailed(Request $request)
    {
        $request->flash();

        $city = $request->input('city');
        $date = $request->input('date');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $shift_time = $request->input('shift');
        $people = $request->input('people');
        $method_way = $request->input('method');
        $sort = $request->input('sort');
        $type = $request->input('type');

        $chefs = Chef::where('city', $city)->get();

        if ($minPrice == "" && $maxPrice == "") {
             $meals = Meal::all();
        } else if ($minPrice == "" && $maxPrice != "") {
             $meals = Meal::where('price', '<=', $maxPrice)->get();
        } else if ($minPrice != "" && $maxPrice == "") {
             $meals = Meal::where('price', '>=', $minPrice)->get();
        } else {
            $meals = Meal::whereBetween('price', [$minPrice, $maxPrice])->get();
        }

        $datetimepeoples = DateTimePeople::where('date', $date)
                                         ->where('people_left', '>=', $people)
                                         ->get();
        if ($shift_time == 'All') {
            $shifts = Shift::all();
        } else {
            $shifts = Shift::where('shift', $shift_time)->first();
        }
        
        if ($method_way == 'All') {
            $methods = Method::all();
        } else {
            $methods = Method::where('method', $method_way)->first();
        }

        if ($type == null) {
            $categories = Category::all();
        } else {
            $categories = Category::wherein('id', $type)->get();
        }
        

        //find chef_meal_id
        $chef_id = $this->ToArrayId($chefs);
        
        $chef_meals = Meal::wherein('chef_id', $chef_id)->get();

        $chef_meal_id = $this->ToArrayId($chef_meals);

        //find meal_meal_id
        $meal_meal_id = $this->ToArrayId($meals);
        
        //find date_meal_id
        $date_meal_id = $this->ToArrayMealId($datetimepeoples);
        
        //find shift_meal_id
        if ($shift_time == 'All') {
            $shift_meal_id = $this->ToMultiArrayMealID($shifts);
        } else {
            $shift_meals = $shifts->meals()->get();
        
            $shift_meal_id = $this->ToArrayId($shift_meals);
        }

        //find Method_meal_id
        if ($method_way == 'All') {
            $method_meal_id = $this->ToMultiArrayMealID($methods);
        } else {
            $method_meals = $methods->meals()->get();
        
            $method_meal_id = $this->ToArrayId($method_meals);
        }
        //find Category_meal_id
        $category_meal_id = $this->ToMultiArrayMealID($categories);

        //find searching meal id
        $meal_id = array_intersect($chef_meal_id, $meal_meal_id, $date_meal_id, $shift_meal_id, $method_meal_id, $category_meal_id);

        if ($sort == "1") {
            $meals = Meal::wherein('id', $meal_id)->orderBy('price', 'asc')->get();
        } else if($sort == "2") {
            $meals = Meal::wherein('id', $meal_id)->orderBy('price', 'desc')->get();
        }
        
        return view('desktop.main.map_list', ['meals' => $meals, 'date' => $date]);
    }

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
