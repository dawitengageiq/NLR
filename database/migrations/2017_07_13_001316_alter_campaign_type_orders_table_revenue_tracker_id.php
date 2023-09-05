<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCampaignTypeOrdersTableRevenueTrackerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_type_orders', function (Blueprint $table) {
            $table->dropForeign('campaign_type_orders_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_type_orders', function (Blueprint $table) {
            $table->dropForeign('campaign_type_orders_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }
}
