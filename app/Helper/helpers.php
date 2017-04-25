<?php

use App\Presenters\Lang\LangPresenterFactory;

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

function getLocaleLang()
{
    return LangPresenterfactory::create( Cache::get(request()->getClientIp(), 'en'));
}