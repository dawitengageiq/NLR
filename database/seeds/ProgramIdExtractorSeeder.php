<?php

use Illuminate\Database\Seeder;
use App\Campaign;
class ProgramIdExtractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaigns = Campaign::whereIn('campaign_type',[1,2,3,7,8,9,10,11,12])->lists('name','id');

	    foreach($campaigns as $id => $name) {
	        // echo $id.' - '.$name.'<br>';
	        preg_match('#\((.*?)\)#', $name, $match);
	        if($match) {
	        	$prg_id = $match[1];
	        	if(is_numeric($prg_id) && $prg_id > 0) {
	        		$campaign = Campaign::find($id);
	        		$campaign->olr_program_id = $prg_id;
	        		$campaign->save();
	        	}
	        }
	        // print_r($match);
	        // echo '<br>';
	    }
    }
}
