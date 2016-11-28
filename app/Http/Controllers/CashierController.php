<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\CashierService;
use App\Services\CreditCardService;
use App\Services\EventService;
use App\Services\SessionService;

class CashierController extends Controller
{
    protected $cashierService;
    protected $creditCardService;
    protected $eventService;
    protected $sessionService;

    public function __construct(CashierService $cashierService, CreditCardService $creditCardService, EventService $eventService,  SessionService $sessionService) {
        $this->middleware('auth');

        $this->cashierService = $cashierService;
        $this->creditCardService = $creditCardService;
        $this->eventService = $eventService;
        $this->sessionService = $sessionService;
    }

    public function getBindingCard($id)
    {
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

        return redirect()->route('order.userorder', $user->id);
    }

    public function postOneTimeCheckout(Request $request)
    {
        $user = $this->cashierService->getUser();

        $this->creditCardService->setAPIKey(config('services.stripe.secret'));
        try {
            $customer = $this->creditCardService->createCustomer($user, $request);
            $carts = $this->cashierService->getCart($user);
            $totalPrice = $this->cashierService->getTotalPrice($carts);

            $userOrder = $this->cashierService->createUserOrder($user, encrypt($customer->id), $totalPrice);

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

            return redirect()->route('order.userorder', $user->id);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
