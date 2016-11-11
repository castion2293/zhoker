<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;
use App\DateTimePeople;
use App\Cart;
use Auth;
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
        $methods = $meal->methods()->get();

        return view('desktop.main.products', ['meal' => $meal, 'datetimepeople' => $datetimepeople, 'methods' => $methods]);
    }

    public function postAddToCart(Request $request, $meal_id, $datetime_id)
    {
        $meal = Meal::findOrFail($meal_id);
        $datetime = DateTimePeople::findorFail($datetime_id);
        $cart = new Cart;

        $cart->user_id = Auth::user()->id;
        $cart->meal_id = $meal->id;
        $cart->unite_price = $meal->price;
        $cart->people_order = $request->input('people_order');
        $cart->date = $datetime->date;
        $cart->time = $datetime->time;
        $cart->method =  

        dd($cart);
    }
}
