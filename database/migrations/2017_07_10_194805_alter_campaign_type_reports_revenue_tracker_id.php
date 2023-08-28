<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignTypeReportsRevenueTrackerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_type_reports', function (Blueprint $table) {
            $table->dropForeign('campaign_type_reports_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('cascade');
        });

        Schema::table('campaign_type_views', function (Blueprint $table) {
            $table->dropForeign('campaign_type_views_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('cascade');
        });

        Schema::table('campaign_view_reports', function (Blueprint $table) {
            $table->dropForeign('campaign_view_reports_revenue_tracker_id_foreign');
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
        Schema::table('campaign_type_reports', function (Blueprint $table) {
            $table->dropForeign('campaign_type_reports_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });

        Schema::table('campaign_type_views', function (Blueprint $table) {
            $table->dropForeign('campaign_type_views_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });

        Schema::table('campaign_view_reports', function (Blueprint $table) {
            $table->dropForeign('campaign_view_reports_revenue_tracker_id_foreign');
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }
}
