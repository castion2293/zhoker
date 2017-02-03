<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\EvaluationService;
use App\Services\OrderService;
use App\Services\AgentService;
use App\Services\GateService;
use Session;

class EvaluationController extends Controller
{
    protected $evaluationService;
    protected $orderService;
    protected $agentService;
    protected $gateService;

    public function __construct(EvaluationService $evaluationService, OrderService $orderService, AgentService $agentService, GateService $gateService)
    {
        $this->middleware('auth');

        $this->orderService = $orderService;
        $this->evaluationService = $evaluationService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    public function create($id)
    {
        $id = $this->gateService->decrypt($id)->getId();

        $cart = $this->evaluationService->findCart($id)->getCart();
        
        $agent = $this->agentService->agent();
        return view($agent . '.products.evaluation', ['cart' => $cart]); 
    }
    
    public function store(Request $request, $id)
    {
        $id = $this->gateService->decrypt($id)->getId();

        $user = $this->evaluationService->findUser()->getUser();
        $cart = $this->evaluationService->findCart($id)->getCart();
        $this->evaluationService->createComment($user->id, $cart->meals->id, $request);
        $this->evaluationService->updateMealEvaluate($cart->meals, $request->score);
        $this->evaluationService->updateCartEvaluated($cart);

        $userorders = $this->orderService->getUserOrderByUser($user, 'desc');

        flash()->success('Success', 'The Evaluation has been submitted!');

        $agent = $this->agentService->agent();
        return view($agent . '.user.order', ['userorders' => $userorders]);
    }
}
