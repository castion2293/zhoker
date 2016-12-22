<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $this->middleware('auth', ['only' => ['getUserOrder']]);
        $this->middleware('chef', ['except' => ['getUserOrder']]);

        $this->orderService = $orderService;
        $this->creditCardService = $creditCardService;
        $this->eventService = $eventService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    public function getUserOrder($id)
    {
        $id = $this->gateService->decrypt($id);
        $this->gateService->userIdCheck($id);

        $user = $this->orderService->getUser($id);
        $userorders = $this->orderService->getUserOrderByUser($user, 'desc');

        $agent = $this->agentService->agent();
        return view($agent . '.user.order', ['userorders' => $userorders]);
    }

    public function getChefOrder($id)
    {
        $id = $this->gateService->decrypt($id);
        $this->gateService->chefIdCheck($id);

        $chef = $this->orderService->getChef($id);
        $cheforders = $this->orderService->getChefOrder($chef, 6);
       
        $agent = $this->agentService->agent();
        return view($agent . '.chef.order', ['cheforders'=> $cheforders]);
    }

    public function getAccept($id)
    {
        $id = $this->gateService->decrypt($id);

        $chefOrder = $this->orderService->getChefOrderById($id);

        $this->gateService->chefIdCheck($chefOrder->chef_id);

        $cart = $this->orderService->getCart($chefOrder);
        $userOrder = $this->orderService->getUserOrderByCart($cart);

        $this->creditCardService->setAPIKey(config('services.stripe.secret'));

        try {
            if ($this->orderService->updateChefOrderCheck($chefOrder)) {

                $this->creditCardService->charge($cart->price, "twd", decrypt($userOrder->cashier_id));

                $this->orderService->updateChefOrderPaid($chefOrder);

                //send user meal confirmed email
                $user = $this->orderService->getUserByCart($cart);
                $this->eventService->chefConFirmEvent($user, $cart);

                return redirect()->route('order.cheforder', ['id' => $chefOrder->chef_id]);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }    
    }

    public function getReject($id)
    {
        $id = $this->gateService->decrypt($id);

        $chefOrder = $this->orderService->getChefOrderById($id);

        $this->gateService->chefIdCheck($chefOrder->chef_id);

        $cart = $this->orderService->getCart($chefOrder);
        $datetimepeople = $this->orderService->getDateTimePeopleByCart($cart);
        $this->orderService->updatePeopleOrder($datetimepeople, $cart, true);

        $this->orderService->deleteChefOrder($chefOrder);
        $this->orderService->deleteCart($cart);

        //send user meal Rejected email
        $user = $this->orderService->getUserByCart($cart);
        $this->eventService->chefRejectEvent($user, $cart);

        return redirect()->route('order.cheforder', ['id' => encrypt($chefOrder->chef_id)]);
    }
}
