<?php

use Illuminate\Database\Seeder;

class RevTrackerNamerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $affiliates = \App\AffiliateRevenueTracker::groupBy('affiliate_id')->lists('affiliate_id');
        // foreach($affiliates as $aff_id) {
        // 	$counter = 1;
        // 	$rev_trackers = \App\AffiliateRevenueTracker::where('affiliate_id',$aff_id)->lists('id');
        // 	foreach($rev_trackers as $rev_id) {
        // 		$rev_tracker = \App\AffiliateRevenueTracker::find($rev_id);
        // 		$rev_tracker->website = 'Source '.$counter++;
        // 		$rev_tracker->save();
        // 	}
        // }

        $rev_trackers = \App\AffiliateRevenueTracker::lists('id');
        foreach($rev_trackers as $id) {
            $tracker = \App\AffiliateRevenueTracker::find($id);
            $tracker->website = 'Rev Tracker: '.$tracker->revenue_tracker_id;
            $tracker->save();
        }
    }
}
