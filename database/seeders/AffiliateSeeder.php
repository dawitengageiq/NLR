<?php

namespace Database\Seeders;

use App\Affiliate;
use Illuminate\Database\Seeder;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Affiliate::factory()->count(10000)->create();
    }
}
