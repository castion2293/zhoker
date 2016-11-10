<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;
use Session;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['getProductShow']]);
    }

    public function getProductShow($id, $datetime_id) 
    {    
        $meal = Meal::findOrFail($id);
        $datetimepeople = $meal->datetimepeoples()->findOrFail($datetime_id);

        return view('desktop.main.products', ['meal' => $meal, 'datetimepeople' => $datetimepeople]);
    }

    public function postAddToCart(Request $request, $id)
    {
        dd($request, $id);
    }
}
