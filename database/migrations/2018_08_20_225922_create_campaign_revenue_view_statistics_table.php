<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignRevenueViewStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_revenue_view_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('revenue_tracker_id')->unsigned()->index();
            $table->integer('campaign_id')->unsigned()->index();
            $table->double('revenue', 15, 8)->index();
            $table->integer('views')->unsigned()->index();
            $table->date('created_at');

            $table->unique(['revenue_tracker_id', 'campaign_id', 'created_at'], 'tracker_campaign_id_date');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_revenue_view_statistics');
    }
}
