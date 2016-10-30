<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ChefSignInRequest;

use App\Map;
use App\Chef;
use Jenssegers\Agent\Agent;
use Auth;
use Session;


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
            Session::put('login', 'chef');

            $id = Auth::user()->chef_id;
            $chef = Chef::find($id);
            $meals = $chef->meals()->orderBy('updated_at', 'desc')->take(6)->get();

            return view('desktop.chef.chef', ['chef' => $chef, 'meals' => $meals]);
        }
        Session::flash('ChefError', 'These credentials do not match our records.');
        return redirect()->back();
    }

    public function getChefContent()
    {
        $id = Auth::user()->chef_id;
        $chef = Chef::find($id);
        $meals = $chef->meals()->orderBy('updated_at', 'desc')->take(6)->get();
        
        return view('desktop.chef.chef', ['chef' => $chef, 'meals' => $meals]);
    }
}
