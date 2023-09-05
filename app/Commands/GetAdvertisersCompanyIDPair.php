<?php

namespace App\Commands;

use App\Advertiser;
use Illuminate\Contracts\Bus\SelfHandling;

class GetAdvertisersCompanyIDPair extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return array
     */
    public function handle()
    {
        //return Advertiser::orderBy('company')->lists('company','id');

        $advertisersList = [];
        $advertisers = Advertiser::select('id', 'company')->where('status', 1)->orderBy('company')->get();

        foreach ($advertisers as $advertiser) {
            $advertisersList[$advertiser->id] = $advertiser->company.' ('.$advertiser->id.')';
        }

        return $advertisersList;
    }
}
