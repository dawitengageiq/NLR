<?php

use Illuminate\Database\Seeder;

class CampaignIpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CampaignIp::firstOrCreate([
            'campaign_id' => 1,
            'ip' => '192.168.1.8',
        ]);
    }
}
