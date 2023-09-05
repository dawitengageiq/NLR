<?php

use App\NoteCategory;
use Illuminate\Database\Seeder;

class NoCPLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoteCategory::firstOrCreate([
            'name' => 'CPL',
        ]);
    }
}
