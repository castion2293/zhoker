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

    /**
     * EvaluationController constructor.
     * @param EvaluationService $evaluationService
     * @param OrderService $orderService
     * @param AgentService $agentService
     * @param GateService $gateService
     */
    public function __construct(EvaluationService $evaluationService, OrderService $orderService, AgentService $agentService, GateService $gateService)
    {
        $this->middleware('auth');

        $this->orderService = $orderService;
        $this->evaluationService = $evaluationService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;

        parent::boot();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $cart = $this->evaluationService->findCart($id)->getCart();
        
        $agent = $this->agentService->agent();
        return view($agent . '.products.evaluation', ['cart' => $cart]); 
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, $id)
    {
        $user = $this->evaluationService->findUser()->getUser();
        $cart = $this->evaluationService->findCart($id)->getCart();
        $this->evaluationService->createComment($user->id, $cart->meals->id, $request);
        $this->evaluationService->updateMealEvaluate($cart->meals, $request->score);
        $this->evaluationService->updateCartEvaluated($cart);

        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['submit_evaluation']);

        return redirect('order/user_order/' . $user->id . '/?userOrderType=evaluated');
    }
}
