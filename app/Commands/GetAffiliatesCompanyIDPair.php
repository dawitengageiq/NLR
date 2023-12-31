<?php

namespace App\Commands;

use App\Affiliate;
use DB;

class GetAffiliatesCompanyIDPair extends Command
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
     */
    public function handle(): int
    {
        $affiliates = Affiliate::select('id', DB::raw('CONCAT(company," (",id,") ") AS id_company'))->where('status', 1)->orderBy('id_company', 'asc')->pluck('id_company', 'id')->toArray();

        return $affiliates;
    }
}
