<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Cache;
use App\Presenters\Lang\LangPresenterfactory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $lang;

    public static function boot()
    {
        self::$lang = LangPresenterfactory::create( Cache::get('lang', 'en'));
    }
}
