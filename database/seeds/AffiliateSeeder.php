<?php

use Illuminate\Database\Seeder;
use App\Affiliate;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Affiliate::class,10000)->create();
    }
}