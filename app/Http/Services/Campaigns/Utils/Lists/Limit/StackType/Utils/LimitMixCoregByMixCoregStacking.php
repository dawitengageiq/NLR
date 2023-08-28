<?php
namespace App\Http\Services\Campaigns\Utils\Lists\Limit\StackType\Utils;

use Config;

use RevenueTracker;

class LimitMixCoregByMixCoregStacking extends LimitMixCoregByPathType
{

    /**
     * Apply the revenue tracker limit for coreg
     *
     * @param array $stacks
     * @param  $limit
     * @param integer $tempIndex
     * @param boolean $hasOrdering
     * @param array $pathLimit
     * @return array
     */
    public function apply($param)
    {
        list($stacks, $limit, $tempIndex, $hasOrdering, $this->pathLimit, $this->revenueTrackerLimit) = $param;

        // If mix coreg ordering exist, process...
        if($hasOrdering) return $this->applyFirstLevelLimitThenLimitPerPage($stacks, $limit, $tempIndex);

        // Process the limit by path type and revenue tracker
        return $this->applyPathTypeLimitThenFirstLevelLimit($stacks, $this->revenueTrackerLimit['coreg']);
    }

    /**
     * Apply the revenue tracker limit for coreg then limit per page if available
     *
     * @param array $stacks
     * @return array
     */
    protected function applyFirstLevelLimitThenLimitPerPage ($stacks, $limit, $tempIndex)
    {
        // Coreg types id
        $coregTypes = array_keys(config('constants.MIXED_COREG_TYPE_FOR_ORDERING'));

        // Fetch only the tempory stack
        // sort the indexes and reorder
        $tempArray = $stacks[$tempIndex][0];
        ksort($tempArray);
        $collection = collect(array_values($tempArray));

        // Implement revenue tracker first level limit here
        if($revLimit = $this->revenueTrackerLimit['coreg']) $collection->splice($revLimit);

        // If no limit set per pages
        // Distribute to coreg types equally(if possible)
        if(!$limit) $limit =  ceil($collection->count() / 4);

        // Distribute to coreg types
        $pageCount = 1;
        foreach ($coregTypes as $coregType) {
            $stacks[$coregType][0] = $collection->forPage($pageCount, $limit)->toArray();
            $pageCount++;
        }
        // Unset for it was not needed on listing
        unset($stacks[$tempIndex]);

        return $stacks;
    }
}
