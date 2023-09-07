<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRevenueTrackerToCampaignViewReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_view_reports', function (Blueprint $table) {

            $table->integer('revenue_tracker_id')->unsigned()->nullable()->index()->after('current_view_count');
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
        Schema::table('campaign_view_reports', function (Blueprint $table) {

            $table->dropForeign('campaign_view_reports_revenue_tracker_id_foreign');
            $table->dropColumn('revenue_tracker_id');

        });
    }
}
