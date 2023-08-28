<?php

use Illuminate\Database\Seeder;

class CampaignPayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CampaignPayout::firstOrCreate([
			'campaign_id'		=>	1,
			'affiliate_id'		=>	1,
			'received'			=>	2,
            'payout'            =>  1,
		]);
    }
}