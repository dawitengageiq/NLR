<?php

use App\AffiliateRevenueTracker;
use Illuminate\Database\Seeder;

class UpdateRevenueTrackerSubIDBreakdownReportStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rev_trackers = AffiliateRevenueTracker::where('subid_breakdown', '=', 1)
            ->update(['report_subid_breakdown_status' => 1]);
    }
}
