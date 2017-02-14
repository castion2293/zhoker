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
        //$id = $this->gateService->decrypt($id)->userIdCheck()->getId();
        
        //$userorders = $this->orderService->findUser($id)->findUserOrderByUser(6, true)->getUserOrder();
        $userorders = $this->orderService->findUser($id)->findUserOrderByUser($filter)->getUserOrder();
        
        $agent = $this->agentService->agent();
        return view($agent . '.user.order', ['userorders' => $userorders]);
    }

    public function getChefOrder($id, OrderFilters $filter)
    {
        //$id = $this->gateService->decrypt($id)->chefIdCheck()->getId();

        // $cheforders = $this->orderService->findChef($id)->findChefOrder($filter, true, 2)->getChefOrder();
        $cheforders = $this->orderService->findChef($id)->findChefOrder($filter)->getChefOrder();
        
        $agent = $this->agentService->agent();
        return view($agent . '.chef.order', ['cheforders'=> $cheforders]);
    }

    public function getAccept($id)
    {
        $id = $this->gateService->decrypt($id)->getId();

        $chefOrder = $this->orderService->findChefOrderById($id)->getChefOrder();
        
        $this->gateService->chefIdCheck($chefOrder->chef_id);

        $cart = $this->orderService->findCart($chefOrder)->getCart();
        $userOrder = $this->orderService->findUserOrderByCart($cart)->getUserOrder();
        
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

        $chefOrder = $this->orderService->findChefOrderById($id)->getChefOrder();

        $this->gateService->chefIdCheck($chefOrder->chef_id);

        $cart = $this->orderService->findCart($chefOrder)->getCart();
        $this->orderService->getDateTimePeopleByCart($cart)->updatePeopleOrder($cart, true);

        //send user meal Rejected email
        $user = $this->orderService->getUserByCart($cart);
        $this->eventService->chefRejectEvent($user, $cart);

        $this->orderService->deleteChefOrder($chefOrder);
        $this->orderService->deleteCart($cart);
        
        flash()->success('Success', 'You have rejected the order successfully!');
        return redirect()->route('order.cheforder', ['id' => encrypt($chefOrder->chef_id)]);
    }

    public function getCancel($id)
    {
        $id = $this->gateService->decrypt($id)->getId();

        $cart = $this->orderService->findCartById($id)->getCart();
        $this->orderService->getDateTimePeopleByCart($cart)->updatePeopleOrder($cart, true);

        $user = $this->orderService->findUserByCart($cart)->getUser();
        $chef_user = $this->orderService->findChefOrderByCart($cart)->findChefByChefOrder()->findUserByChef()->getUser();

        //send user and chef cancel email
        $this->eventService->ChefCancelEvent($chef_user, $cart);
        $this->eventService->userCancelEvent($user, $cart);

        $this->orderService->deleteCart($cart);

        flash()->success('Success', 'You have rejected the order successfully!');
        return redirect()->route('order.userorder', ['id' => encrypt($user->id)]);
    }
}
