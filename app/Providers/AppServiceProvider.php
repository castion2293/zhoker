<?php

namespace App\Providers;

use Cache;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Presenters\Lang\LangPresenterFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('now', Carbon::now());
        View::share('lang', LangPresenterfactory::create( Cache::get(request()->getClientIp(), 'en')));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local')
        {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }
    }
}
