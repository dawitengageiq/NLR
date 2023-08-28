<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Services\Campaigns\Providers\Lists;
use App\Http\Services\Campaigns\Providers\ListsApi;
use \App\Http\Services\Campaigns\Providers\Facades;
use App\Http\Services\Campaigns\Providers\Interfaces;

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
