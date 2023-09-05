<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterAffiliateRevenueTrackersAddSidNewStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->boolean('new_subid_breakdown_status')->nullable();
            $table->boolean('report_subid_breakdown_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->dropColumn(['new_subid_breakdown_status', 'report_subid_breakdown_status']);
        });
    }
}
