<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Foundation\OrderFilters;

use App\Services\OrderService;
use App\Services\CreditCardService;
use App\Services\EventService;
use App\Services\AgentService;
use App\Services\GateService;

class OrderController extends Controller
{
    protected $orderService;
    protected $creditCardService;
    protected $eventService;
    protected $agentService;
    protected $gateService;

    public function __construct(OrderService $orderService, CreditCardService $creditCardService, AgentService $agentService, EventService $eventService, GateService $gateService) {
        $this->middleware('auth', ['only' => ['getUserOrder', 'getCancel']]);
        $this->middleware('chef', ['except' => ['getUserOrder', 'getCancel']]);

        $this->orderService = $orderService;
        $this->creditCardService = $creditCardService;
        $this->eventService = $eventService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    public function getUserOrder($id, OrderFilters $filter)
    {
        $this->gateService->userIdCheck($id);
        
        //$userorders = $this->orderService->findUser($id)->findUserOrderByUser(6, true)->getUserOrder();
        $userorders = $this->orderService->findUser($id)->findUserOrderByUser($filter)->getUserOrder();
        
        $agent = $this->agentService->agent();
        return view($agent . '.user.order', ['userorders' => $userorders]);
    }

    public function getChefOrder($id, OrderFilters $filter)
    {
        $this->gateService->chefIdCheck($id);

        // $cheforders = $this->orderService->findChef($id)->findChefOrder($filter, true, 2)->getChefOrder();
        $cheforders = $this->orderService->findChef($id)->findChefOrder($filter)->getChefOrder();
        
        $agent = $this->agentService->agent();
        return view($agent . '.chef.order', ['cheforders'=> $cheforders]);
    }

    public function getAccept($id)
    {
        $chefOrder = $this->orderService->findChefOrderById($id)->getChefOrder();
       
        $this->gateService->chefIdCheck($chefOrder->chef_id);
        
        $cart = $this->orderService->findCart($chefOrder)->getCart();
        $userOrder = $this->orderService->findUserOrderByCart($cart)->getUserOrder();
        
        $this->creditCardService->setAPIKey(config('services.stripe.secret'));

        try {
            if ($this->orderService->updateChefOrderCheck($chefOrder)) {

                $this->creditCardService->charge($cart->price, "twd", $userOrder->cashier_id);

                $this->orderService->updateChefOrderPaid($chefOrder);
                $this->orderService->updateMealPeopleEaten($cart->meals);

                //send user meal confirmed email
                $user = $this->orderService->findCart($chefOrder)->getCart();
                $this->eventService->chefConFirmEvent($user, $cart);

                flash()->success('Success', 'You have accepted the order successfully!');

                $url = "order/chef_order/" . $chefOrder->chef_id . "?chefOrderType=approve";
                return redirect($url);
            }

        } catch (\Exception $e) {
            //flash()->error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function postAccept(Request $request)
    {
        $this->creditCardService->setAPIKey(config('services.stripe.secret'));

        foreach ($request->chef_order_id as $id)
        {
            $chefOrder = $this->orderService->findChefOrderById($id)->getChefOrder();
            
            $this->gateService->chefIdCheck($chefOrder->chef_id);
        
            $cart = $this->orderService->findCart($chefOrder)->getCart();
            $userOrder = $this->orderService->findUserOrderByCart($cart)->getUserOrder();

            try {
                if ($this->orderService->updateChefOrderCheck($chefOrder)) {

                    $this->creditCardService->charge($cart->price, "twd", $userOrder->cashier_id);

                    $this->orderService->updateChefOrderPaid($chefOrder);
                    $this->orderService->updateMealPeopleEaten($cart->meals);

                    //send user meal confirmed email
                    $user = $this->orderService->findUserByCart($cart)->getUser();
                    $this->eventService->chefConFirmEvent($user, $cart);
                }

            } catch (\Exception $e) {
                //flash()->error('Error', $e->getMessage());
            }
        }

        flash()->success('Success', 'You have accepted the order successfully!');
    }

    public function getReject($id)
    {
        $chefOrder = $this->orderService->findChefOrderById($id)->getChefOrder();
        
        $this->gateService->chefIdCheck($chefOrder->chef_id);

        $cart = $this->orderService->findCart($chefOrder)->getCart();
        $this->orderService->getDateTimePeopleByCart($cart)->updatePeopleOrder($cart, true);

        // //send user meal Rejected email
        $user = $this->orderService->findUserByCart($cart)->getUser();
        $this->eventService->chefRejectEvent($user, $cart);

        $this->orderService->deleteChefOrder($chefOrder);
        $this->orderService->deleteCart($cart);
        
        flash()->success('Success', 'You have rejected the order successfully!');
        
        $url = "order/chef_order/" . $chefOrder->chef_id . "?chefOrderType=reject";
        return redirect($url);
    }

    public function getCancel($id)
    {
        $cart = $this->orderService->findCartById($id)->getCart();
        $this->orderService->getDateTimePeopleByCart($cart)->updatePeopleOrder($cart, true);

        $user = $this->orderService->findUserByCart($cart)->getUser();
        $chef_user = $this->orderService->findChefOrderByCart($cart)->findChefByChefOrder()->findUserByChef()->getUser();

        //send user and chef cancel email
        $this->eventService->ChefCancelEvent($chef_user, $cart);
        $this->eventService->userCancelEvent($user, $cart);

        $this->orderService->deleteCart($cart);

        flash()->success('Success', 'You have rejected the order successfully!');
       
        $url = "order/user_order/" . $user->id . "?userOrderType=cancel";
        return redirect($url);
    }
}
