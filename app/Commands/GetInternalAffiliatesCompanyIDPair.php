<?php

namespace App\Commands;

use App\Affiliate;
use DB;
use Illuminate\Contracts\Bus\SelfHandling;

class GetInternalAffiliatesCompanyIDPair extends Command implements SelfHandling
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
     * @return mixed
     */
    public function handle()
    {
        $affiliates = Affiliate::select('id', DB::raw('CONCAT(company," (",id,") ") AS affiliate_name'))->where('status', 1)->where('type', 1)->orderBy('company')->lists('affiliate_name', 'id')->toArray();

        return $affiliates;
    }
}
