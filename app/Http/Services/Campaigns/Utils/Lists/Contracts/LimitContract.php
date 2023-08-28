<?php

namespace App\Http\Services\Campaigns\Utils\Lists\Contracts;

Interface LimitContract
{

    /**
     * Set limits
     *
     * @param array limit,
     * @param integer $globalLimitPerStack,
     * @param string $campaignTypeLimit
     */
    public function set ($limit);

    /**
     * Check limit each campaign type
     *
     * @param collection $campaign
     * @param integer $stackCount
     * @return bool
     */
    public function exceed ($type);
}
