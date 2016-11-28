<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Chef;
use App\ChefOrder;
use App\Events\ChefConfirmEvent;
use App\Events\ChefRejectEvent;
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
        
        return view('desktop.chef.order', ['cheforders'=> $cheforders]);
    }

    public function getAccept($id)
    {
        $cheforder = ChefOrder::findOrFail($id);
        $cart = $cheforder->carts()->first();

        $price = $cart->price;
        $customer_id = decrypt($cart->userorders()->first()->cashier_id);

        Stripe::setApiKey(config('services.stripe.secret'));
        try {

            if ($cheforder->update(['checked' => true])) {
                $charge = Charge::create(array(
                    "amount" => $price * 100,
                    "currency" => "twd",
                    "customer" => $customer_id,
                ));

                $cheforder->update(['paid' => true]);

                //send user meal confirmed email
                $user = $cart->users()->first();
                event(new ChefConFirmEvent($user, $cart));

                // $nexmo = app('Nexmo\Client');
                // Nexmo::message()->send([
                //     'to' => '18018823718',
                //     'from' => '18018823718',
                //     'text' => 'Using the facad to send a mesage.'
                // ]);

                return redirect()->route('order.cheforder', ['id' => $cheforder->chef_id]);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }   
    }

    public function getReject($id)
    {
        $cheforder = ChefOrder::findOrFail($id);
        $cart = $cheforder->carts()->first();
        $datetimepeople = $cart->datetimepeoples()->first();

        $datetimepeople->update([
            'people_left' => $datetimepeople->people_left + $cart->people_order,
            'people_order' => $datetimepeople->people_order - $cart->people_order,
        ]);

        $cheforder->delete();
        $cart->delete();

        //send user meal Rejected email
        $user = $cart->users()->first();
        event(new ChefRejectEvent($user, $cart));

        return redirect()->route('order.cheforder', ['id' => $cheforder->chef_id]);
    }
}
