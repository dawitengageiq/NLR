<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cron extends Model
{

    protected $fillable = [
        'leads_queued',
        'leads_processed',
        'leads_waiting',
        'time_started',
        'time_ended',
        'status',
        'lead_ids'
    ];

    public $timestamps = false;

    public function scopeGetOldFinishedJobs($query)
    {
        $dateNow = Carbon::now();
        $whereStatement = "DATE(time_started) < DATE('".$dateNow->toDateTimeString()."')";

        return $query->whereRaw($whereStatement)
                     ->where('status','=',0);
    }
}
