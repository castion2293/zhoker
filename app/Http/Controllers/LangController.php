<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class LangController extends Controller
{
    public function changeLang()
    {
        if (request()->has('lang')) {
            Cache::put(request()->getClientIp(), request('lang'), 60);
        }

        return redirect(url()->previous());
    }
}
