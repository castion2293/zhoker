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
        $chef_id = [];
        $i = 0;
        foreach ($chefs as $chef) {
            $chef_id[$i] = $chef->id;
            $i++;
        }

        $meals = Meal::wherein('chef_id', $chef_id)->get();

        $chef_meal_id = [];
        $j = 0;
        foreach ($meals as $meal) {
            $chef_meal_id[$j] = $meal->id;
            $j++;
        }

        //find shift_meal_id
        $meals = $shifts->meals()->get();
        
        $shift_meal_id = [];
        $k = 0;
        foreach ($meals as $meal) {
            $shift_meal_id[$k] = $meal->id;
            $k++;
        }

        //find date_meal_id
        $date_meal_id = [];
        $l = 0;
        foreach ($datetimepeoples as $datetimepeople) {
            $date_meal_id[$l] = $datetimepeople->meal_id;
            $l++;
        }

        $meal_id = array_intersect($chef_meal_id, $shift_meal_id, $date_meal_id);

        $meals = Meal::find($meal_id);
        
        return view('desktop.main.map_list', ['meals' => $meals]);
    }
}
