<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SendLeadsServiceProvider extends ServiceProvider
{
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
        $this->app->bind(
            'App\Http\Services\Contracts\LeadInterface',
            'App\Http\Services\Repositories\LeadRepository');

        $this->app->bind(
            'App\Http\Services\Contracts\LeadCSVDataInterface',
            'App\Http\Services\Repositories\LeadCSVDataRepository');
    }
}
