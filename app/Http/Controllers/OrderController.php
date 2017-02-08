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
        $id = $this->gateService->decrypt($id)->userIdCheck()->getId();
       
        $user = $this->orderService->getUser($id);
        $userorders = $this->orderService->getUserOrderByUser($user, 'desc');

        $agent = $this->agentService->agent();
        return view($agent . '.user.order', ['userorders' => $userorders]);
    }

    public function getChefOrder($id)
    {
        $id = $this->gateService->decrypt($id)->chefIdCheck()->getId();

        $chef = $this->orderService->getChef($id);
        $cheforders = $this->orderService->getChefOrder($chef, 6);
        $chefordersAll = $this->orderService->getChefOrderAll($chef);
       
        $agent = $this->agentService->agent();
        return view($agent . '.chef.order', ['cheforders'=> $cheforders, 'chefordersAll' => $chefordersAll]);
    }

    public function getAccept($id)
    {
        $id = $this->gateService->decrypt($id)->getId();

        $chefOrder = $this->orderService->getChefOrderById($id);

        $this->gateService->chefIdCheck($chefOrder->chef_id);

        $cart = $this->orderService->getCart($chefOrder);
        $userOrder = $this->orderService->getUserOrderByCart($cart);

        $this->creditCardService->setAPIKey(config('services.stripe.secret'));

        try {
            if ($this->orderService->updateChefOrderCheck($chefOrder)) {

                $this->creditCardService->charge($cart->price, "twd", decrypt($userOrder->cashier_id));

                $this->orderService->updateChefOrderPaid($chefOrder);
                $this->orderService->updateMealPeopleEaten($cart->meals);

                //send user meal confirmed email
                $user = $this->orderService->getUserByCart($cart);
                $this->eventService->chefConFirmEvent($user, $cart);

                flash()->success('Success', 'You have accepted the order successfully!');
                return redirect()->route('order.cheforder', ['id' => encrypt($chefOrder->chef_id)]);
            }

        } catch (\Exception $e) {
            //flash()->error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getReject($id)
    {
        $id = $this->gateService->decrypt($id)->getId();

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

        flash()->success('Success', 'You have rejected the order successfully!');
        return redirect()->route('order.cheforder', ['id' => encrypt($chefOrder->chef_id)]);
    }
}
