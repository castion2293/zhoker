<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Map;
use Jenssegers\Agent\Agent;

class MainController extends Controller
{
    public function getIndex()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
          print_r("mobile"); 
        } else {
          return view('desktop.index');
        }
    }

    public function getMaplist(Request $request)
    {
        $city = $request->input('city');

        $maps = Map::where('city', $city)->get();

        return view('desktop.main.map_list', ['maps' => $maps]);
    }
}
