<?php

namespace App\Providers;

use Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

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
        View::share('lang', $this->localeLang(request()->has('lang')));
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

    /**
     * @param $hasLanguage
     * @return mixed
     */
    protected function localeLang($hasLanguage)
    {
        if ($hasLanguage)
            Cache::forever('lang', request('lang'));

        return Cache::get('lang', 'en');
    }
}
