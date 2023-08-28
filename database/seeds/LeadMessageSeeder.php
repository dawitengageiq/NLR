<?php

use Illuminate\Database\Seeder;
use App\Lead;
use App\LeadMessage;

class LeadMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();

        $leadIDs = Lead::lists('id')->toArray();

        foreach($leadIDs as $leadID)
        {
            $data = LeadMessage::firstOrCreate([
                'id'	=>	$leadID,
                //'value'		=>	$faker->sentence
            ]);

            $data->value = $faker->sentence;
            $data->save();
        }
    }
}
