<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\User;
use App\Observers\ConfigObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Config::observe(ConfigObserver::class);
        Paginator::useBootstrap();
    }
}
