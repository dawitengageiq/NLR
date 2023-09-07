<?php

use App\LeadUser;
use Illuminate\Database\Seeder;

class LeadUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LeadUser::class, 50)->create();
    }
}
