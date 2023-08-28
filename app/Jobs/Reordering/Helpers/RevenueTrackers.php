<?php
namespace App\Jobs\Reordering\Helpers;

use DB;
use App\AffiliateRevenueTracker;

class RevenueTrackers
{
    /**
     * Indevidual revenue tracker traits
     *
     */
    use RevenueTrackerTrait;

    /**
     * [protected description]
     *
     * @var iIlluminate\Database\Eloquent\Builder $query
     */
    protected $query;

    /**
     * Instantiate
     * Initial query
     *
     */
    public function __construct ()
    {
        $this->query = AffiliateRevenueTracker::where('mixed_coreg_order_status', '!=', 0)
            ->where('mixed_coreg_recurrence', '=', 'daily');
    }

    /**
     * Set revenue tracker id
     * It will be used to query specific revenue tracker.
     *
     * @param integer $revenueTRrackerID
     */
    public function setRevenueTRrackerID ($revenueTRrackerID)
    {
        $this->query->where('revenue_tracker_id', $revenueTRrackerID);
    }

    /**
     * Set the time
     * It will be used to query revenue tracker match on this time
     *
     * @param  integer $hour
     */
    public function setTime ($hour)
    {
        $this->query->where('mixed_coreg_daily', '=', $hour . ':00:00');
    }

    /**
     * Set mixe coreg Type ids
     * Use to query related campaign view reports with campaign type id is in $mixeCoregTypes
     *
     * @param  array $mixeCoregTypes
     */
    public function setMixeCoregTypeIDs ($mixeCoregTypes)
    {
        $this->mixeCoregTypes = $mixeCoregTypes;

    }

    /**
     * Check if there is revenue trackers
     *
     * @return bool
     */
    public function notExists()
    {
        if(count($this->revenueTrackers) <= 0) return true;
        return false;
    }

    /**
     * Get all revenue trackers
     *
     * @return array
     */
    public function get ()
    {
        return $this->revenueTrackers;
    }

    /**
     * Get specific revenue tracker
     *
     * @return yield
     */
    public function getRevenueTracker()
    {
        for ($i = 0; $i < count($this->revenueTrackers); $i++) {
            // Revenue tracker trait
            // $this->setTraitsOf($this->revenueTrackers[$i]);

            yield $this->revenueTrackers[$i];
        }
    }

    /**
     * Query the revenue trackers
     *
     * @var eloquentCollection $revenueTrackers
     */
    public function query ()
    {
        $this->revenueTrackers = $this->query
            ->has('mixedCoregCampaignOrder')
            ->with('mixedCoregCampaignOrder')
            ->with(['campaignViewReports' => function($query) {
                return $query->where(function($query) {
                    foreach($this->mixeCoregTypes as  $typeID) {
                        $query->orWhere('campaign_type_id','=', $typeID);
                    }
                })
                ->with(['campaignInfo' => function ($query) {
                    return $query->select('id', 'status');
                }]);
            }])
            ->get();
        // printR($this->revenueTrackers, true);
    }
}
