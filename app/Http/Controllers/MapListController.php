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

        $meals = $this->mapListService->mapList($request);
        
        $agent = $this->agentService->agent();
        return view($agent . '.main.map_list', ['meals' => $meals, 'date' => $request->input('date')]);
    }

    public function postMaplistDetailed(Request $request)
    {
        $this->sessionService->requestFlash($request);

        $meals = $this->mapListService->mapListDetail($request);
        
        $agent = $this->agentService->agent();
        return view($agent . '.main.map_list', ['meals' => $meals, 'date' => $request->input('date')]);
    }
}
