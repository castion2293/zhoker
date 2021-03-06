<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChefService;
use App\Services\AgentService;
use App\Services\GateService;
use App\Services\ImageService;

use App\Http\Requests;
use App\Http\Requests\MealCreateRequest;

class ChefController extends Controller
{
    protected $chefService;
    protected $agentService;
    protected $gateService;
    protected $imageService;

    public function __construct(ChefService $chefService, AgentService $agentService, GateService $gateService, ImageService $imageService) 
    {
        $this->middleware('chef');
        
        $this->chefService = $chefService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
        $this->imageService = $imageService;

        parent::boot();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $meals = $this->chefService->index();
        $meals = $this->chefService->findUser()->findChef()->findMeals(6)->getMeal();

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
        $chef = $this->chefService->findUser()->findChef()->getChef();
        $images = $this->imageService->findImageByChef($chef)->getImage();

        $categories = $this->chefService->getCategory();
        $methods = $this->chefService->getMethod();
        $shifts = $this->chefService->getShift();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.create', ['categories' => $categories, 'methods' => $methods, 'shifts' => $shifts, 'images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealCreateRequest $request)
    {
        $meal = $this->chefService->createMeal($request)->getMeal();
        $this->chefService->connectImage($meal);
        $this->chefService->connectCategory($meal);
        $this->chefService->connectMethod($meal);
        $this->chefService->connectShift($meal);

        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['create_meal']);

        $agent = $this->agentService->agent();
        //return view($agent . '.chef.show',['meal' => $meal]);
        return redirect()->action('ChefController@show', ['id' => $meal->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = $this->chefService->findMeal($id)->getMeal();

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
        $meal = $this->chefService->findMeal($id)->getMeal();

        $this->gateService->chefIdCheck($meal->chef_id);

        $chef = $this->chefService->findUser()->findChef()->getChef();
        $images = $this->imageService->findImageByChef($chef)->getImage();

        $mealImages = $this->chefService->editImage($meal);
        $shiftarray = $this->chefService->editShift();
        $categoryarray = $this->chefService->editCategory();
        $methodarray = $this->chefService->editMethod();
        
        $agent = $this->agentService->agent();
        return view($agent . '.chef.edit', ['meal' => $meal, 'images' => $images, 'mealImages' => $mealImages,
                                            'shifts' => $shiftarray, 'categories' => $categoryarray, 'methods' => $methodarray]);
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
        $meal = $this->chefService->findMeal($id)->getMeal();
        $meal = $this->chefService->updateMeal($meal, $request)->getMeal();
        $this->chefService->connectImage($meal);
        $this->chefService->connectCategory($meal);
        $this->chefService->connectMethod($meal);
        $this->chefService->connectShift($meal);
        
        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['update_meal']);
        return redirect()->action('ChefController@show', ['id' => $meal->id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $meal = $this->chefService->findMeal($id)->getMeal();
        $this->gateService->chefIdCheck($meal->chef_id);

        $this->chefService->destroy($meal);

        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['delete_meal']);
        //return redirect()->route('chef.index');
        return redirect()->action('ChefController@index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDateTimePeople($id)
    {
        $meal = $this->chefService->findMeal($id)->getMeal();
        $this->gateService->chefIdCheck($meal->chef_id);

        $datetimepeople = $this->chefService->findDatetimePeople($meal)->getDateTimePeople();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.datetimepeople', ['meal' => $meal, 'datetimepeoples' => $datetimepeople]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDateTimePeople(Request $request, $id)
    {
        $meal = $this->chefService->findMeal($id)->getMeal();
        $this->gateService->chefIdCheck($meal->chef_id);

        $datetimepeople = $this->chefService->findDatetimePeople($meal)->getDateTimePeople();

        $this->chefService->updateDatetimePeople($meal, $datetimepeople, $request);

        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['update_datetimepeople']);
        return redirect()->action(
            'ChefController@show', ['id' => $meal->id]
        );
    }
}
