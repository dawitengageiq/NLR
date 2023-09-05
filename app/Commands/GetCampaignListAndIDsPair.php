<?php

namespace App\Commands;

use App\Campaign;
use Cache;
use Illuminate\Contracts\Bus\SelfHandling;

class GetCampaignListAndIDsPair extends Command implements SelfHandling
{
    protected $activeOnly;

    /**
     * Create a new command instance.
     */
    public function __construct($activeOnly = null)
    {
        $this->activeOnly = $activeOnly;
    }

    /**
     * Execute the command.
     *
     * @return array
     */
    public function handle()
    {
        // \Log::info('Here');
        // \Log::info($this->status);
        // \DB::enableQueryLog();
        if ($this->activeOnly != '') {
            $activeOnly = $this->activeOnly;
            $campaignList = Cache::remember('activeCampaignList-', 5, function () {
                return Campaign::where('status', '!=', 0)->orderBy('name')->lists('name', 'id')->toArray();
            });
        } else {
            $campaignList = Cache::remember('campaignList', 5, function () {
                return Campaign::orderBy('name')->lists('name', 'id')->toArray();
            });
        }
        // \Log::info(\DB::getQueryLog());

        $pair[''] = 'ALL';

        foreach ($campaignList as $key => $campaign) {
            $pair[$key] = $campaign.'('.$key.')';
        }

        return $pair;
    }
}
