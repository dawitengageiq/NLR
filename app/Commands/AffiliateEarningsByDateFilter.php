<?php

namespace App\Commands;

use App\Lead;
use App\HandPAffiliateReport;
use App\ExternalPathAffiliateReport;
use App\AffiliateWebsiteReport;
use Carbon\Carbon;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Log;
use App\Setting;

class AffiliateEarningsByDateFilter extends Command implements SelfHandling
{
    protected $affiliate_id, $date_filter_type, $from_date, $to_date;

    /**
     * Create a new command instance.
     *
     * @param $affiliate_id
     * @param $date_filter_type
     */
    public function __construct($affiliate_id, $date_filter_type)
    {
        $this->affiliate_id = $affiliate_id; 
        $this->date_filter_type = $date_filter_type;

        switch($this->date_filter_type) {
            case 1: //TODAY
                $from = Carbon::today()->toDateString();
                $to = Carbon::today()->toDateString();
                break;
            case 2: //YESTERDAY
                $from = Carbon::today()->subDay()->toDateString();
                $to = Carbon::today()->subDay()->toDateString();
                break;
            case 3: //WEEK
                $from = Carbon::today()->startOfWeek()->toDateString();
                $to = Carbon::today()->endOfWeek()->toDateString();
                break;
            case 4: //MONTH
                $from = Carbon::today()->startOfMonth()->toDateString();
                $to = Carbon::today()->endOfMonth()->toDateString();
                break;
            case 5: //YEAR
                $from = Carbon::today()->startOfYear()->toDateString();
                $to = Carbon::today()->endOfYear()->toDateString();
                break;
            default:
                $from = Carbon::today()->toDateString();
                $to = Carbon::today()->toDateString();
                break;
        }
        $this->from_date = $from;
        $this->to_date = $to;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $settings = Setting::where('code', 'publisher_percentage_revenue')->first();
        $share = $settings ? $settings->description : 100;
        $share_perc = $share / 100;

        $getNew = false;
        if(!session()->has('_affEDate-'.$this->date_filter_type)) {
            $getNew = true;
        }else {
            $checker = Carbon::now()->subMinutes(5);
            $date = Carbon::parse(session('_affEDate-'.$this->date_filter_type));
            if($checker->greaterThan($date)) {
                $getNew = true;
            }
        }
        // $getNew = true;

        // $earnings = Lead::where('lead_status',1)
        //     ->where('affiliate_id',$this->affiliate_id)
        //     ->whereBetween('updated_at',[$this->from_date,$this->to_date])
        //     ->sum('payout');

        if($getNew) {
            // \DB::connection('secondary')->enableQueryLog();
            $hp = HandPAffiliateReport::where('affiliate_id',$this->affiliate_id)->whereBetween('created_at', [$this->from_date,$this->to_date])
                ->sum('payout');

            $ep = ExternalPathAffiliateReport::where('affiliate_id',$this->affiliate_id)->whereBetween('created_at', [$this->from_date,$this->to_date])
                ->sum('received');

            $wr = AffiliateWebsiteReport::where('affiliate_id',$this->affiliate_id)->whereBetween('date', [$this->from_date,$this->to_date])
                ->sum('payout');

            // \Log::info(\DB::connection('secondary')->getQueryLog());
            // \Log::info($this->date_filter_type);
            // \Log::info($hp);
            // \Log::info($ep);
            // \Log::info($wr);
            $earnings = ($ep * $share_perc) + $hp + $wr;
            // \Log::info($earnings);
            $earnings = sprintf("%.2f",$earnings);
            // $earnings = $this->toFixed($earnings, 2);
            // \Log::info('_affEarnings-'.$this->date_filter_type.' = '.$ep.' : '.$earnings);
            session(['_affEDate-'.$this->date_filter_type => Carbon::now(), '_affEarnings-'.$this->date_filter_type => $earnings ]);
        }

        return session('_affEarnings-'.$this->date_filter_type);
    }

    protected function toFixed($number, $precision, $separator = '.'){
        $numberParts = explode($separator, $number);
        $response = $numberParts[0];
        if (count($numberParts)>1 && $precision > 0) {
            $response .= $separator;
            $response .= substr($numberParts[1], 0, $precision);
        }
        return $response;
    }
}
