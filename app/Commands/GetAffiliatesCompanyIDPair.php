<?php

namespace App\Commands;

use App\Affiliate;
use DB;
use Illuminate\Contracts\Bus\SelfHandling;

class GetAffiliatesCompanyIDPair extends Command implements SelfHandling
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
        $affiliates = Affiliate::select('id', DB::raw('CONCAT(company," (",id,") ") AS id_company'))->where('status', 1)->orderBy('id_company', 'asc')->lists('id_company', 'id')->toArray();

        return $affiliates;
    }
}
