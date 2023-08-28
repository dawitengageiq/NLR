<?php

use Illuminate\Database\Seeder;
use App\NoteCategory;

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
        	'name' => 'CPL'
        ]);
    }
}
