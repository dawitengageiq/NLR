<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CampaignNoTracker extends Model
{
    protected $table = 'campaign_no_trackers';

    protected $fillable = [
        'campaign_id',
        'email',
        'count',
        'last_session'
    ];

    public function scopeWithDaysOld($query,$numberOfDays)
    {
        $dateNow = Carbon::now()->toDateString();
        return $query->whereRaw("DATEDIFF(DATE('$dateNow'),DATE(updated_at)) > $numberOfDays");
    }
}
