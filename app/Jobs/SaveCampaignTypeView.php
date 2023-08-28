<?php

namespace App\Jobs;

use App\CampaignTypeView;
use App\CampaignTypeReport;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Log;

class SaveCampaignTypeView extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $campaign_type_id;
    protected $revenue_tracker_id;
    protected $session;
    protected $timestamp;

    /**
     * Create a new job instance.
     *
     * @param $campaign_type_id
     * @param $revenue_tracker_id
     * @param $session
     * @param $timestamp
     */
    public function __construct($campaign_type_id, $revenue_tracker_id, $session, $timestamp)
    {
        $this->campaign_type_id = $campaign_type_id;
        $this->revenue_tracker_id = $revenue_tracker_id;
        $this->session = $session;
        $this->timestamp = $timestamp;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->attempts() > 1)
        {
            return;
        }

        try
        {
            CampaignTypeView::create([
                'campaign_type_id'   =>  $this->campaign_type_id,
                'revenue_tracker_id' =>  $this->revenue_tracker_id,
                'session'            =>  $this->session,
                'timestamp'          =>  $this->timestamp
            ]);

            $report = CampaignTypeReport::firstOrNew([
                'campaign_type_id'    =>  $this->campaign_type_id,
                'revenue_tracker_id'  =>  $this->revenue_tracker_id,
            ]);

            if($report->exists)
            {
                $report->views = $report->views + 1;
            }
            else
            {
                $report->views = 1;
            }

            $report->save();
        }
        catch(QueryException $e)
        {
            // Log::info($e->getMessage());
        }

    }
}
