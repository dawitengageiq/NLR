<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignTypeReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_type_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_type_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->nullable()->index();
            $table->integer('views')->default(0);

            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_type_reports');
    }
}
