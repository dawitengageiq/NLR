<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterAffiliaterReportsRemoveForeignKeyConstraintAffiliateIdAndRevenueTrackerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->dropForeign('affiliate_reports_affiliate_id_foreign');
            $table->dropForeign('affiliate_reports_revenue_tracker_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('cascade');
        });
    }
}
