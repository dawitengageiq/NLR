<?php
namespace App\Jobs\ConsolidatedGraph\Utils\Traits;

trait CakeRevenue
{
    /**
     * Get the last page revenue, use bench mark to determine the campaign id for last page campaign type
     *
     * @param \App\CakeRevenue|Empty $cakeRevenue
     * @return void
     */
    protected function processCakeRevenue($cakeRevenue, $revenueTrackerdID,  $exitPageID, $date)
    {
        // Fetch last page revenue, we will not use the default last page offer id    
        if($exitPageID) $cakeRevenue = $this->lastPageRevenue($revenueTrackerdID, $exitPageID, $date);

        if(!$cakeRevenue instanceof \App\CakeRevenue) return;

        if($cakeRevenue->revenue) $this->setRevenue('lsp_revenue', $cakeRevenue->revenue, false);

        return;
    }

    /**
     * Fetch last page revenue
     *
     * @param  integer $revenueTrackerdID
     * @param  integer $exitPageID
     * @param  string $date
     * @return App\CakeRevenue
     */
    public function lastPageRevenue($revenueTrackerdID, $exitPageID, $date)
    {
        return \App\CakeRevenue::where('offer_id', $exitPageID)
            ->where('revenue_tracker_id', $revenueTrackerdID)
            ->whereDate('created_at', '=', $date)
            ->get([
                'affiliate_id',
                'revenue_tracker_id',
                'offer_id',
                'revenue',
                'created_at'
            ]);
    }
}
