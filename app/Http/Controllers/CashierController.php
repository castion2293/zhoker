<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\CashierService;
use App\Services\CreditCardService;
use App\Services\EventService;
use App\Services\SessionService;
use App\Services\GateService;

class CashierController extends Controller
{
    protected $cashierService;
    protected $creditCardService;
    protected $eventService;
    protected $sessionService;
    protected $gateService;

    public function __construct(CashierService $cashierService, CreditCardService $creditCardService, EventService $eventService, SessionService $sessionService,
                                GateService $gateService) {
        $this->middleware('auth');

        $this->cashierService = $cashierService;
        $this->creditCardService = $creditCardService;
        $this->eventService = $eventService;
        $this->sessionService = $sessionService;
        $this->gateService = $gateService;
    }

    public function getBindingCard($id)
    {
        $this->gateService->userIdCheck($id);

        $user = $this->cashierService->getUser($id);
        $this->sessionService->put('oldUrl', url()->previous());

        //for binding credit card
        $url = "user_profile/" . $user->id . "/edit#payment";
        return redirect($url);
    }

    public function postBindingCheckout(Request $request)
    {
        $user = $this->cashierService->getUser();
        $creditCard = $this->cashierService->getCreditCard($user);
        $carts = $this->cashierService->getCart($user);
        $totalPrice = $this->cashierService->getTotalPrice($carts);

        $userOrder = $this->cashierService->createUserOrder($user, $creditCard->customer_id, $totalPrice);

        foreach ($carts as $cart) {
            $chefOrder = $this->cashierService->createChefOrder($cart);

            $this->cashierService->orderUpdate($cart, $userOrder, $chefOrder);

            //update meal people left number
            $this->cashierService->peopleOrderUpdate($cart);
            
            //send chef order email
            $chef_user = $this->cashierService->getChefUser($chefOrder);
            $this->eventService->chefOrderEvent($chef_user);
        }

        //send user order email
        $this->eventService->userOrderEvent($user, $carts);

        flash()->success('Success', 'Your order has been created successfully!');

        $url = "order/user_order/" . $user->id . "?userOrderType=all";
        return redirect($url);
    }

    public function postOneTimeCheckout(Request $request)
    {
        $user = $this->cashierService->getUser();

        $this->creditCardService->setAPIKey(config('services.stripe.secret'));
        try {
            $customer = $this->creditCardService->createCustomer($user, $request);
            $carts = $this->cashierService->getCart($user);
            $totalPrice = $this->cashierService->getTotalPrice($carts);

            $userOrder = $this->cashierService->createUserOrder($user, $customer->id, $totalPrice);

            foreach ($carts as $cart) {
                $chefOrder = $this->cashierService->createChefOrder($cart);

                $this->cashierService->orderUpdate($cart, $userOrder, $chefOrder);

                //update meal people left number
                $this->cashierService->peopleOrderUpdate($cart);
                
                //send chef order email
                $chef_user = $this->cashierService->getChefUser($chefOrder);
                $this->eventService->chefOrderEvent($chef_user);
            }

            //send user order email
            $this->eventService->userOrderEvent($user, $carts);

            flash()->success('Success', 'Your order has been created successfully!');

            $url = "order/user_order/" . $user->id . "?userOrderType=all";
            return redirect($url);

        } catch (\Exception $e) {
            flash()->error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
