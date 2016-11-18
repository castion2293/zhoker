<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getUserOrder($id)
    {
        $user = User::findOrFail($id);

        $userorders = $user->userorders()->get();

        return view('desktop.user.order', ['userorders', $userorders]);
    }
}
