<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignPartnerPayout extends Model
{
    protected $table = 'campaign_partner_payouts';

    protected $fillable = [
        'campaign_id',
        'affiliate_id',
        'amount',
        'effective_date',
    ];

    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }

    public function affiliate()
    {
        return $this->belongsTo('App\Affiliate');
    }
}
