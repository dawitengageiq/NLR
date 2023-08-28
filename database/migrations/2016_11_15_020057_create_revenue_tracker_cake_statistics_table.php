<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueTrackerCakeStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_tracker_cake_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->index();
            $table->integer('cake_campaign_id')->unsigned()->index();
            $table->smallInteger('type')->unsigned()->default(1);
            $table->integer('clicks')->unsigned()->default(0);
            $table->float('payout')->unsigned();
            $table->date('created_at');
            //$table->timestamps();

            //$table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
            $table->foreign('affiliate_id')->references('affiliate_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
            $table->foreign('cake_campaign_id')->references('campaign_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('revenue_tracker_cake_statistics');
    }
}
