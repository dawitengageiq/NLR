<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetCampaignTypeViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:campaign_type_views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear campaign type views table.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $campaign_type_job = (new \App\Jobs\ClearCampaignTypeView());
        dispatch($campaign_type_job);
    }
}
