<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueTrackerWebsiteViewStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_tracker_webview_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->index();
            $table->integer('website_campaign_id')->unsigned()->index(); //this is the campaign_id of revenue tracker and website_id of affiliate_websites
            $table->integer('passovers')->unsigned()->default(0);
            $table->float('payout')->unsigned()->default(0.0);
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('revenue_tracker_webview_statistics');
    }
}
