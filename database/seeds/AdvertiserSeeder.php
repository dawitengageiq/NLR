<?php

use App\Advertiser;
use Illuminate\Database\Seeder;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Advertiser::class, 20)->create();
    }
}
