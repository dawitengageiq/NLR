<?php

use App\WebsitesViewTracker;
use Illuminate\Database\Seeder;

class WebsitesViewTrackerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WebsitesViewTracker::class,150)->create();
    }
}
