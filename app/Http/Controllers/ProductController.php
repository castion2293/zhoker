<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Meal;
use App\DateTimePeople;
use App\Method;
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
        $method = Method::findorFail($request->method_way);
        $cart = new Cart;

        $cart->user_id = Auth::user()->id;
        $cart->meal_id = $meal->id;
        $cart->datetimepeople_id = $datetime_id;
        $cart->unite_price = $meal->price;
        $cart->people_order = $request->input('people_order');
        $cart->price = $meal->price * $request->people_order;
        $cart->date = $datetime->date;
        $cart->time = $datetime->time;
        $cart->method =  $method->method;
        
        $cart->save();

        return redirect()->route('product.cart.show', $cart->user_id);
    }

    public function getCartShow($id)
    {
        $user = User::findOrFail($id);

        $carts = $user->carts()->where('checked', '0')->get();
        
        $cartQtyArray = [];
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $cartQtyArray[$cart->id] = $cart->people_order;
            $totalPrice += $cart->price;
        }

        return view('desktop.main.shoppingCart', ['carts' => $carts, 'Qtys' => $cartQtyArray, 'totalPrice' => $totalPrice] );
    }

    public function postCartRemove(Request $request)
    {
        $carts = Auth::user()->carts()->where('checked', '0')->get();

        foreach ($carts as $cart) {
            $cart->people_order = $request->qty[$cart->id];
            $cart->price = $cart->unite_price * $cart->people_order;
            $cart->save();
        }

        $item = Cart::findOrFail($request->id);
        $item->delete();
    }
}
