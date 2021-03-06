<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\MainService;
use App\Services\AgentService;
use App\Services\AuthenticateService;
use App\Services\SessionService;

use App\Http\Requests;
use App\Http\Requests\ChefSignInRequest;

class MainController extends Controller
{
    protected $mainService;
    protected $agentService;
    protected $authenticateService;
    protected $sessionService;

    private $attempt_key;

    /**
     * MainController constructor.
     * @param MainService $mainService
     * @param AgentService $agentService
     * @param AuthenticateService $authenticateService
     * @param SessionService $sessionService
     */
    public function __construct(MainService $mainService, AgentService $agentService, AuthenticateService $authenticateService, SessionService $sessionService)
    {
        $this->mainService = $mainService;
        $this->agentService = $agentService;
        $this->authenticateService = $authenticateService;
        $this->sessionService = $sessionService;

        $this->attempt_key = 0;

        parent::boot();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $agent = $this->agentService->agent();
        return view($agent . '/index');
    }

    /**
     * @param ChefSignInRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function chefLogin(ChefSignInRequest $request)
    {
        if ($this->authenticateService->chefLogin($request->all())) {
            //set flash data with chef login
            $this->sessionService->put('login', 'chef');

            $chef = $this->mainService->findUser()->findChef()->getChef();
            $meals = $this->mainService->findMeals($chef, 6)->getMeals();
            $cheforders = $this->mainService->findChefOrders($chef, 3)->getChefOrders();

            $agent = $this->agentService->agent();
            return redirect('/chef_content');
            //return view($agent . '.chef.chef', ['chef' => $chef, 'meals' => $meals, 'cheforders' => $cheforders]);
        }

        $this->authenticateService->throttlesLogins($request);
        $this->authenticateService->incrementLoginAttempt($request);

        $this->sessionService->flash('ChefError', 'These credentials do not match our records.');
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChefContent()
    {
        $chef = $this->mainService->findUser()->findChef()->getChef();
        $meals = $this->mainService->findMeals($chef, 6)->getMeals();
        $cheforders = $this->mainService->findChefOrders($chef, 3)->getChefOrders();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.chef', ['chef' => $chef, 'meals' => $meals, 'cheforders' => $cheforders]);
    }
}
