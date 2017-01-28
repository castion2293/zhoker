<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MapListRequest;

use App\Services\MapListService;
use App\Services\SessionService;
use App\Services\AgentService;

class MapListController extends Controller
{
    protected $mapListService;
    protected $sessionService;
    protected $agentService;

    public function __construct(MapListService $mapListService, SessionService $sessionService, AgentService $agentService) 
    {
        $this->mapListService = $mapListService;
        $this->sessionService = $sessionService;
        $this->agentService = $agentService;
    }

    public function postMaplist(MapListRequest $request)
    {
        $this->sessionService->requestFlash($request);

        $chefMealId = $this->mapListService->findChef($request->city)->findChefMealId()->getId();
        $shiftMealId = $this->mapListService->findShift($request->shift)->findShiftMealId()->getId();
        $datetimepeopleMealId = $this->mapListService->findDatetimepeople($request->date)->findDatetimepeopleMealId()->getId();
        $meals = $this->mapListService->findMeal($chefMealId, $shiftMealId, $datetimepeopleMealId)->sortMeal()->getMeal();
        
        $agent = $this->agentService->agent();
        return view($agent . '.main.map_list', ['meals' => $meals, 'date' => $request->input('date')]);
    }

    public function postMaplistDetailed(Request $request)
    {
        $this->sessionService->requestFlash($request);

        $chefMealId = $this->mapListService->findChef($request->city)->findChefMealId()->getId();
        $priceMealId = $this->mapListService->findPrice($request->minPrice, $request->maxPrice)->findPriceId()->getId();
        $datetimepeopleMealId = $this->mapListService->findDatetimepeople($request->date, $request->people)->findDatetimepeopleMealId()->getId();
        $shiftMealId = $this->mapListService->findShift($request->shift)->findShiftMealId()->getId();
        $methodMealId = $this->mapListService->findMethod($request->method)->findMethodMealId()->getId();
        $categoryMealId = $this->mapListService->findCategory($request->type)->findCategoryMealId()->getId();
        $meals = $this->mapListService->findMeal($chefMealId, $priceMealId, $datetimepeopleMealId, $shiftMealId, $methodMealId, $categoryMealId)
                                      ->sortMeal($request->sort)
                                      ->getMeal();
        
        $agent = $this->agentService->agent();
        return view($agent . '.main.map_list', ['meals' => $meals, 'date' => $request->input('date')]);
    }

    public function getMaplistSearch()
    {
         $agent = $this->agentService->agent();
         return view($agent . '.main.MapListSearch');
    }
}
