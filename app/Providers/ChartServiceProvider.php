<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Services\Charts\Providers\Interfaces;

class ChartServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    //protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Required class
        Interfaces::bind($this->app);
    }
}
