<?php

namespace App\Jobs\Reordering\Helpers;

trait RevenueTrackerTrait
{
    /**
     * Set individual revenue tracker
     * It will be use to get its own traits
     *
     * @param  eloquentCollection  $revenueTracker
     */
    public function setTraitsOf(eloquentCollection $revenueTracker)
    {
        $this->revenueTracker = $revenueTracker;
    }

    /**
     * Get order of campaign ids
     *
     * @return array
     */
    public function campaignOrder(): array
    {
        return json_decode($this->revenueTracker->mixedCoregCampaignOrder->campaign_id_order);
    }

    /**
     * Get revenue tracker id
     *
     * @return int
     */
    public function revenueTrackerID(): int
    {
        return $this->revenueTracker->revenue_tracker_id;
    }

    /**
     * Get reference date
     *
     * @return string|timestamp
     */
    public function referenceDate()
    {
        return $this->revenueTracker->mixedCoregCampaignOrder->reorder_reference_date;
    }

    /**
     * Get order by
     *
     * @return int
     */
    public function mixedCoregOrderBy(): int
    {
        return $this->revenueTracker->mixed_coreg_order_by;
    }

    /**
     * Get eloquentCollection campaign order
     *
     * @return eloquentCollection
     */
    public function mixedCoregCampaignOrder(): eloquentCollection
    {
        return $this->revenueTracker->mixedCoregCampaignOrder;
    }

    /**
     * Get eloquentCollection campaign view reports
     *
     * @return eloquentCollection
     */
    public function campaignViewReports(): eloquentCollection
    {
        return $this->revenueTracker->campaignViewReports;
    }

    /**
     * check if recurrence is ...
     *
     * @param  string  $recurrence
     * @return bool
     */
    public function recurrenceIs(string $recurrence): bool
    {
        if ($this->revenueTracker->mixed_coreg_recurrence == $recurrence) {
            return true;
        }

        return false;
    }

    /**
     * check if recurrence is not ...
     *
     * @param  string  $recurrence
     * @return bool
     */
    public function recurrenceIsNot(string $recurrence): bool
    {
        if ($this->revenueTracker->mixed_coreg_recurrence != $recurrence) {
            return true;
        }

        return false;
    }
}
