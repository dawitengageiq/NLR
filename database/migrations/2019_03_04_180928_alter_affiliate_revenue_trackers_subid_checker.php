<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAffiliateRevenueTrackersSubidChecker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->boolean("subid_breakdown")->default(0);
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
            $table->dropColumn("subid_breakdown");
        });
    }
}
