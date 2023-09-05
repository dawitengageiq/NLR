<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignTypeViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_type_views', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_type_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->nullable()->index();
            $table->string('session', 255);
            $table->dateTime('timestamp');

            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');

            $table->unique(['campaign_type_id', 'session'], 'campaign_type_views_campaign_type_id_session_unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_type_views');
    }
}
