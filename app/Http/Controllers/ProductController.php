<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Meal;
use App\DateTimePeople;
use App\Method;
use App\Cart;
use App\UserOrder;
use Auth;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

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

        return view('desktop.products.products', ['meal' => $meal, 'datetimepeople' => $datetimepeople, 'methods' => $methods]);
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

        return view('desktop.products.shoppingCart', ['carts' => $carts, 'Qtys' => $cartQtyArray, 'totalPrice' => $totalPrice] );
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

    public function postCartStore(Request $request)
    {
        $carts = Auth::user()->carts()->where('checked', '0')->get();

        foreach ($carts as $cart) {
            $cart->people_order = $request->qty[$cart->id];
            $cart->price = $cart->unite_price * $cart->people_order;
            $cart->save();
        }
    }

    public function getCheckout($id)
    {
        $user = User::findOrFail($id);

        $carts = $user->carts()->where('checked', '0')->get();

        if ($carts->isEmpty()) {
            dd("empty");
        }

        $cartQtyArray = [];
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $cartQtyArray[$cart->id] = $cart->people_order;
            $totalPrice += $cart->price;
        }

        return view('desktop.products.checkout', ['user' => $user, 'carts'=> $carts, 'totalPrice' => $totalPrice] );
    }

    public function postCheckout(Request $request)
    {
        $user = Auth::user();

        $carts = $user->carts()->where('checked', '0')->get();

        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->price;

            // $cart->checked = true;
            // $cart->save();
        }

        $userOrder = UserOrder::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'paid_token' => encrypt($request->input('stripeToken')),
            'pay_way' => '',
            'contact_first_name' => $request->input('first_name'),
            'contact_last_name' => $request->input('last_name'),
            'contact_phone_number' => $request->input('phone_number'),
            'contact_email' => $request->input('email'),
            'contact_address' => '',
        ]);

        foreach ($carts as $cart) {
            $cart->userorders()->associate($userOrder);
            $cart->checked = true;
            $cart->save();
        }
        //$userOrder->carts()->associate($carts); 

        dd($userOrder);
        // Stripe::setApiKey(config('services.stripe.secret'));
        // try {
        //     $charge = Charge::create(array(
        //         "amount" => $totalPrice * 100,
        //         "currency" => "twd",
        //         "source" => $request->input('stripeToken'), 
        //         "description" => "Testing"
        //     ));
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }
}
