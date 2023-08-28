<?php

use Illuminate\Database\Seeder;

class AffiliateCampaignRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	$affiliates = \App\Affiliate::lists('id')->take(10)->toArray();
    	$campaigns = \App\Campaign::lists('id')->take(10)->toArray();

        for($x = 0; $x < 3; $x++) {

            $affiliateCampaignRequest = App\AffiliateCampaignRequest::firstOrCreate([
                'campaign_id' => $faker->randomElement($campaigns),
                'affiliate_id' => $faker->randomElement($affiliates)
            ]);

            $affiliateCampaignRequest->status =  $faker->numberBetween(0,3);
            $affiliateCampaignRequest->save();
        }
    }
}
