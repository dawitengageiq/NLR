<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;
use Log;
use PhpParser\Error;

class TestJob extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $message = '';

    /**
     * Create a new job instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     */
    public function handle()
    {
        if ($this->attempts() > 1)
        {
            return;
        }

        Log::info('Amazing Test Job Using Supervisor! '.$this->message);

        $haller['awts'] = 'array message!';

        try
        {
            sleep(30);
            Log::info('array message daw: '.$haller['ambot']);
        }
        catch(\ErrorException $e)
        {
            Log::info($e->getCode());
            Log::info($e->getMessage());
        }

        Log::info('test job done!');
    }
}
