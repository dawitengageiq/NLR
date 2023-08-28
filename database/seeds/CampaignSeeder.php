<?php

use Illuminate\Database\Seeder;
use App\Campaign;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Campaign::class,50)->create();
    }
}
