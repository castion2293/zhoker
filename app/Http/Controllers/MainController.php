<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Map;

class MainController extends Controller
{
    public function getIndex()
    {
        return view('index');
    }

    public function getMaplist()
    {
        $maps = Map::all();

        return view('main.map_list', ['maps' => $maps]);
    }
}
