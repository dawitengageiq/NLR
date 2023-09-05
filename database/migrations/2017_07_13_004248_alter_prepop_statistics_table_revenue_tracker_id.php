<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterPrepopStatisticsTableRevenueTrackerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mixed_coreg_campaign_orders', function (Blueprint $table) {
            $table->dropForeign('mixed_coreg_campaign_orders_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('cascade');
        });

        Schema::table('prepop_statistics', function (Blueprint $table) {
            $table->dropForeign('prepop_statistics_revenue_tracker_id_foreign');
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
        Schema::table('mixed_coreg_campaign_orders', function (Blueprint $table) {
            $table->dropForeign('mixed_coreg_campaign_orders_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });

        Schema::table('prepop_statistics', function (Blueprint $table) {
            $table->dropForeign('prepop_statistics_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }
}
