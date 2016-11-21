<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Chef;
use App\ChefOrder;
use Stripe\Stripe;
use Stripe\Charge;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['getUserOrder']]);
        $this->middleware('chef', ['except' => ['getUserOrder']]);
    }

    public function getUserOrder($id)
    {
        $user = User::findOrFail($id);

        $userorders = $user->userorders()->orderBy('id', 'desc')->get();

        return view('desktop.user.order', ['userorders' => $userorders]);
    }

    public function getChefOrder($id)
    {
        $chef = Chef::findOrFail($id);

        $cheforders = $chef->cheforders()->orderBy('id', 'desc')->paginate(6);
        
        // $cheforders->each(function($cheforder) {
        //     $cart = $cheforder->carts()->first();
        // });

        return view('desktop.chef.order', ['cheforders'=> $cheforders]);
    }

    public function getAccept($id)
    {
        $cheforder = ChefOrder::findOrFail($id);

        $price = $cheforder->carts()->first()->price;
        $customer_id = decrypt($cheforder->carts()->first()->userorders()->first()->cashier_id);

        Stripe::setApiKey(config('services.stripe.secret'));
        try {

            if ($cheforder->update(['checked' => true])) {
                $charge = Charge::create(array(
                    "amount" => $price * 100,
                    "currency" => "twd",
                    "customer" => $customer_id,
                ));

                $cheforder->update(['paid' => true]);

                return redirect()->route('order.cheforder', ['id' => $cheforder->chef_id]);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }   
    }

    public function getReject($id)
    {
        dd($id);
    }
}
