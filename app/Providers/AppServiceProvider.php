<?php

namespace App\Providers;

use Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Presenters\Lang\LangPresenterfactory;

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
        View::share('lang', LangPresenterfactory::create( Cache::get('lang', 'en')));
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
