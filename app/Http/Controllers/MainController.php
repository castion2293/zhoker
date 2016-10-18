<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Map;
use Jenssegers\Agent\Agent;
use Auth;
use Session;
use App\Http\Requests\ChefSignInRequest;

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

    public function chefLogin(ChefSignInRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password'),
            'chef_psw' => $request->input('chef_psw'),
        ])) {
            //set flash data with chef login
            Session::flash('login', 'chef');

            return redirect()->to('chef');
        }
        Session::flash('ChefError', 'These credentials do not match our records.');
        return redirect()->back();
    }

    public function getMaplist(Request $request)
    {
        $city = $request->input('city');

        $maps = Map::where('city', $city)->get();

        return view('desktop.main.map_list', ['maps' => $maps]);
    }
}
