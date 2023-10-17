<?php

use App\AffiliateWebsite;
use Illuminate\Database\Seeder;

class AffiliateWebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AffiliateWebsite::factory()->count(5)->create([
            'affiliate_id' => 7750,
        ]);
    }
}
