<?php

namespace App\Providers;

use App\Http\Services\Campaigns\Providers\Facades;
use App\Http\Services\Campaigns\Providers\Interfaces;
use App\Http\Services\Campaigns\Providers\Lists;
use App\Http\Services\Campaigns\Providers\ListsApi;
use Illuminate\Support\ServiceProvider;

class CampaignListServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap campaign list
        Lists::boot($this->app);

        // Bootstrap campaign list by api
        ListsApi::boot($this->app);
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

        //Required facades
        Facades::bind($this->app);
    }
}
