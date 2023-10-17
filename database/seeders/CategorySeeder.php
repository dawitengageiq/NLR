<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::firstOrCreate([
            'name' => 'Regular',
            'status' => 1,
        ]);

        App\Category::firstOrCreate([
            'name' => 'Market Research',
            'status' => 1,
        ]);

        App\Category::firstOrCreate([
            'name' => 'Work At Home',
            'status' => 1,
        ]);

        App\Category::firstOrCreate([
            'name' => 'Sweepstakes',
            'status' => 1,
        ]);
    }
}
