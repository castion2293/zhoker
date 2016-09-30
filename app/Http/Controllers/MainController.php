<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function getIndex()
    {
        return view('index');
    }

    public function getMaplist()
    {
        return view('main.map_list');
    }
}
