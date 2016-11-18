<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\UserOrder;
use App\ChefOrder;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Session;
use Auth;

class CashierController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
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

    public function getBindingCard($id)
    {
        $user = User::findOrFail($id);

        Session::put('oldUrl', url()->previous());

        //for binding credit card
        $url = "user_profile/" . $user->id . "/edit#payment";
        return redirect($url);
    }

    public function postBindingCheckout(Request $request)
    {
        $user = Auth::user();

        $this->order($user, $user->creditcards()->first()->customer_id);

        return redirect()->route('product.cart.order', $user->id);
    }

    public function postOneTimeCheckout(Request $request)
    {
        $user = Auth::user();

        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            
            $customer = Customer::create([
                "email" => $user->email,
                "source" => $request->input('stripeToken'),
                "description" => $user->first_name,
            ]);

            $cashier_id = encrypt($customer->id);
            
            $this->order($user, $cashier_id);

            return redirect()->route('order.userorder', $user->id);

            // $charge = Charge::create(array(
            //     "amount" => $totalPrice * 100,
            //     "currency" => "twd",
            //     "customer" => "cus_9ZSZmHziuSwSS3",
            // ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function order($user, $cashier_id)
    {
        $carts = $user->carts()->where('checked', '0')->get();

        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->price;
        }

        $userOrder = UserOrder::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'pay_way' => '',
            'contact_first_name' => $user->first_name,
            'contact_last_name' => $user->last_name,
            'contact_phone_number' => $user->phone_number,
            'contact_email' => $user->email,
            'contact_address' => '',
            'cashier_id' => $cashier_id,
        ]);

        foreach ($carts as $cart) {
            $chefOrder = ChefOrder::create([
                'chef_id' => $cart->meals()->first()->chef_id,
            ]);

            $cart->userorders()->associate($userOrder);
            $cart->cheforders()->associate($chefOrder);
            $cart->checked = true;
            $cart->save();
        }
    }
}
