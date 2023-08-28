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
        factory(AffiliateWebsite::class,5)->create([
            'affiliate_id' => 7750
        ]);
    }
}
