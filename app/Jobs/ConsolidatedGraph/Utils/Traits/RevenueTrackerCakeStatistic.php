<?php
namespace App\Jobs\ConsolidatedGraph\Utils\Traits;

trait RevenueTrackerCakeStatistic
{
    /**
     * Process revenue tracker cake statistics.
     * Over all payout of specific revenue tracker.
     *
     * @param \App\RevenueTrackerCakeStatistic|Empty $leads
     * @return void
     */
    protected function processRevTrackerCakeStats($revTrackerCakeStats)
    {
        if(!$revTrackerCakeStats instanceof \App\RevenueTrackerCakeStatistic) return;

        if($revTrackerCakeStats->payout) $this->clicksRegStats['payout'] = $revTrackerCakeStats->payout;

        return;
    }
}
