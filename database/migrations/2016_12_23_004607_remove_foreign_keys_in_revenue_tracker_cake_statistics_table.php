<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revenue_tracker_cake_statistics', function (Blueprint $table) {
            $table->dropForeign('revenue_tracker_cake_statistics_affiliate_id_foreign');
            $table->dropForeign('revenue_tracker_cake_statistics_cake_campaign_id_foreign');
            $table->dropForeign('revenue_tracker_cake_statistics_revenue_tracker_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revenue_tracker_cake_statistics', function (Blueprint $table) {
            $table->foreign('affiliate_id')->references('affiliate_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
            $table->foreign('cake_campaign_id')->references('campaign_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }
};
