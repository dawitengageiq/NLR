<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignTypeOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_type_orders', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('revenue_tracker_id')->unsigned()->nullable();
            $table->integer('campaign_type_id')->unsigned();
            $table->longText('campaign_id_order');
            $table->date('reorder_reference_date');

            $table->unique(['revenue_tracker_id', 'campaign_type_id']);

            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_type_orders');
    }
}
