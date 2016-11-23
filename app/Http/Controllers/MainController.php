<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AgentService;
use App\services\ChefCRUDService;
use App\services\AuthenticateService;

use App\Http\Requests;
use App\Http\Requests\ChefSignInRequest;

use Session;


class MainController extends Controller
{
    protected $agentService;
    protected $chefCRUDService;
    protected $authenticateService;

    public function __construct(AgentService $agentService, ChefCRUDService $chefCRUDService, AuthenticateService $authenticateService)
    {
        $this->agentService = $agentService;
        $this->chefCRUDService = $chefCRUDService;
        $this->authenticateService = $authenticateService;
    }

    public function getIndex()
    {
        $agent = $this->agentService->agent();
        return view($agent);
    }

    public function chefLogin(ChefSignInRequest $request)
    {
        if ($this->authenticateService->chefLogin($request->all())) {
            //set flash data with chef login
            Session::put('login', 'chef');

            $chef = $this->chefCRUDService->getChef();
            $meals = $this->chefCRUDService->getChefMeals(6);

            return view('desktop.chef.chef', ['chef' => $chef, 'meals' => $meals]);
        }
        Session::flash('ChefError', 'These credentials do not match our records.');
        return redirect()->back();
    }

    public function getChefContent()
    {
        $chef = $this->chefCRUDService->getChef();
        $meals = $this->chefCRUDService->getChefMeals(6);

        return view('desktop.chef.chef', ['chef' => $chef, 'meals' => $meals]);
    }
}
