<?php

namespace Database\Seeders;

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
        LeadUser::factory()->count(50)->create();
    }
}
