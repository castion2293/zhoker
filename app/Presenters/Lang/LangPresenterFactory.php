<?php

namespace App\Presenters\Lang;

use Illuminate\Support\Facades\App;

class LangPresenterFactory
{
    public static function create($lang)
    {
        App::bind(LangPresenterInterface::class, 'App\Presenters\Lang\LangPresenter_' . $lang);
        return App::make(LangPresenterInterface::class);
    }
}