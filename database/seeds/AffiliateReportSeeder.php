<?php

use Illuminate\Database\Seeder;

class AffiliateReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $rev_trackers = \App\AffiliateRevenueTracker::lists('affiliate_id', 'revenue_tracker_id')->toArray();

        foreach ($rev_trackers as $rev => $aff) {
            $affiliate = \App\Affiliate::find($aff);
            $revenue_tracker = \App\AffiliateRevenueTracker::where('revenue_tracker_id', $rev)->first();
            $payout = $faker->numberBetween(15, 55);
            $revenue = $faker->numberBetween(30, 110);
            $we_get = $revenue - $payout;
            $margin = ($we_get / $revenue) * 100;
            App\AffiliateReport::firstOrCreate([
                'affiliate_id' => $aff,
                'affiliate_name' => $affiliate->company,
                'affiliate_revenue_tracker_id' => $rev,
                'revenue_tracker_name' => $revenue_tracker->website,
                'type' => 1,
                'clicks' => $faker->numberBetween(100, 500),
                'payout' => $payout,
                'leads' => $faker->numberBetween(500, 1000),
                'revenue' => $revenue,
                'we_get' => $we_get,
                'margin' => $margin,
                'created_at' => Carbon\Carbon::yesterday(),
            ]);
        }
    }
}
