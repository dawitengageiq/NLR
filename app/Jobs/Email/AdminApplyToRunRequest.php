<?php

namespace App\Jobs\Email;

use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminApplyToRunRequest extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Array $email_data)
    {
        $this->email_data = $email_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        if ($this->attempts() > 1)
        {
            return;
        }

        extract($this->email_data);

        $mailer->send('emails.admin_apply_to_run_request',
            ['admin' => $admin, 'campaign' => $campaign, 'affiliate' => $affiliate],
            function ($mail) use ($admin) {

            $mail->from('admin@engageiq.com', 'Engage IQ: Lead Reactor');

            $mail->to($admin->email, $admin->first_name.' '.$admin->last_name)->subject('Lead Reactor: Affiliate Apply to Run Request');
        });

        echo 'Dispatching email: admin apply to run request.';
    }

    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        // Called when the job is failing...
    }
}
