<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

use App\Services\ChefProfileService;
use App\Services\MainService;
use App\Services\AgentService;
use App\Services\GateService;

use App\Http\Requests;
use App\Http\Requests\ChefProfileEditRequest;

class ChefProfileController extends Controller
{
    protected $chefProfileService;
    protected $mainService;
    protected $agentService;
    protected $gateService;

    public function __construct(ChefProfileService $chefProfileService, MainService $mainService, AgentService $agentService, GateService $gateService) {
        $this->middleware('chef');

        $this->chefProfileService = $chefProfileService;
        $this->mainService = $mainService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = $this->chefProfileService->index();
        
        return redirect()->route('chef_profile.edit', encrypt($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = $this->gateService->decrypt($id);
        $this->gateService->chefIdCheck($id);

        $chef = $this->chefProfileService->edit($id);

        $agent = $this->agentService->agent();
        return view($agent . '.chef.edit_profile', ['chef' => $chef]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChefProfileEditRequest $request, $id)
    {
        $chef = $this->chefProfileService->update($request, $id);

        $meals = $this->mainService->getMeals($chef, 6);
        $cheforders = $this->mainService->getChefOrders($chef, 3);

        $agent = $this->agentService->agent();
        return view($agent . '.chef.chef', ['chef' => $chef, 'meals' => $meals, 'cheforders' => $cheforders]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
