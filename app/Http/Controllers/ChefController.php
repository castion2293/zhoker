<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

use App\Services\ChefService;
use App\Services\AgentService;
use App\Services\GateService;

use App\Http\Requests;
use App\Http\Requests\MealCreateRequest;

class ChefController extends Controller
{
    protected $chefService;
    protected $agentService;
    protected $gateService;

    public function __construct(ChefService $chefService, AgentService $agentService, GateService $gateService) 
    {
        $this->middleware('chef');
        
        $this->chefService = $chefService;
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
        $meals = $this->chefService->index();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->chefService->createCategory();
        $methods = $this->chefService->createMethod();
        $shifts = $this->chefService->createShift();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.create', ['categories' => $categories, 'methods' => $methods, 'shifts' => $shifts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealCreateRequest $request)
    {
        $meal = $this->chefService->store($request);

        flash()->success('Success', 'The meal has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = $this->gateService->decrypt($id);

        $meal = $this->chefService->show($id);

        $this->gateService->chefIdCheck($meal->chef_id);

        $agent = $this->agentService->agent();
        return view($agent . '.chef.show',['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = $this->gateService->decrypt($id);

        $meal = $this->chefService->editMeal($id);

        $this->gateService->chefIdCheck($meal->chef_id);

        $datetimepeoples = $this->chefService->editDatetimePeople($meal);
        $shiftarray = $this->chefService->editShift();
        $categoryarray = $this->chefService->editCategory();
        $methodarray = $this->chefService->editMethod();
        
        $agent = $this->agentService->agent();
        return view($agent . '.chef.edit', ['meal' => $meal, 'datetimepeoples' => $datetimepeoples, 'shifts' => $shiftarray, 'categories' => $categoryarray, 'methods' => $methodarray]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MealCreateRequest $request, $id)
    {
        $meal = $this->chefService->update($request, $id);
        
        return redirect()->route('chef.show', encrypt($meal->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = $this->chefService->editMeal($id);
        $this->gateService->chefIdCheck($meal->chef_id);

        $this->chefService->destroy($meal);
        
        return redirect()->route('chef.index');
    }

    public function uploadImage(Request $request, $id)
    {
        $meal = $this->chefService->editMeal($id);
        $this->gateService->chefIdCheck($meal->chef_id);

        $this->chefService->uploadImage($request, $meal);
    }

    public function deleteImage($image_id, $meal_id)
    {
        $meal = $this->chefService->editMeal($meal_id);
        $this->gateService->chefIdCheck($meal->chef_id);

        $this->chefService->deleteImage($image_id);

        $url = "chef/" . encrypt($meal_id) . "/edit#submit";
        return redirect($url);
    }
}
