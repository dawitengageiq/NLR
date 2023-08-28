<?php

use Illuminate\Database\Seeder;
use App\LeadUser;

class LeadUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LeadUser::class,50)->create();
    }
}
