<?php

use Illuminate\Database\Seeder;
use App\LeadDataAdv;
use App\Lead;

class LeadDataAdvSeeder extends Seeder
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
            $data = LeadDataAdv::firstOrCreate([
                'id'	=>	$leadID,
            ]);

            $data->value = $faker->url;
            $data->save();
        }
    }
}
