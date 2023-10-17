<?php

namespace Database\Seeders;

use App\NoteCategory;
use Illuminate\Database\Seeder;

class NoCPLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        NoteCategory::firstOrCreate([
            'name' => 'CPL',
        ]);
    }
}
