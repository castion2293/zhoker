<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MapListRequest;

use App\Chef;
use App\Meal;
use App\DateTimePeople;
use App\Shift;

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
}
