<?php

namespace App\Jobs;

use App\Jobs\Job;
use ErrorException;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Database\QueryException;
use App\CampaignNoTracker;
use Log;
use PDOException;

class CampaignNoTracking extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $email;
    protected $campaigns;
    protected $session;

    /**
     * Create a new job instance.
     *
     * @param $email
     * @param $campaigns
     * @param $session
     */
    public function __construct($email, $campaigns, $session)
    {
        $this->email = $email;
        $this->campaigns = $campaigns;
        $this->session = $session;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->campaigns as $id)
        {
            try
            {
                if(empty($id) || $id <= 0)
                {
                    continue;
                }

                $tracker = CampaignNoTracker::firstOrNew([
                    'email'         =>  $this->email,
                    'campaign_id'   =>  $id
                ]);

                if($tracker->exists)
                {
                    if($this->session != $tracker->last_session)
                    {
                        $tracker->count += 1;
                        $tracker->last_session = $this->session;
                        $tracker->save();
                    }
                }
                else
                {
                    $tracker->count = 1;
                    $tracker->last_session = $this->session;
                    $tracker->save();
                }

            }
            catch(ErrorException $e)
            {
                Log::info("campaign_id: $id");
                Log::info($e->getMessage());
                Log::info($e->getCode());
            }
            catch(PDOException $e)
            {
                Log::info("campaign_id: $id");
                Log::info($e->getMessage());
                Log::info($e->getCode());
            }
        }
    }
}
