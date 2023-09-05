<?php

use Illuminate\Database\Seeder;

class CampaignFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CampaignFilter::firstOrCreate([
            'campaign_id' => 1,
            'filter_type_id' => 1,
        ]);
    }
}
