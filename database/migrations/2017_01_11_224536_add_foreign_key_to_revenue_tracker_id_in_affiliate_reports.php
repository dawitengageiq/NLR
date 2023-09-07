<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToRevenueTrackerIdInAffiliateReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->integer('revenue_tracker_id')->unsigned()->change();
            //then add the foreign key to revenue_tracker_cake_statistics
            $table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('revenue_tracker_cake_statistics')->onDelete('cascade');
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
            //$table->integer('revenue_tracker_id')->unsigned()->change();
            //restore it back to original
            //$table->foreign('revenue_tracker_id')->references('revenue_tracker_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
            $table->dropForeign('affiliate_reports_revenue_tracker_id_foreign');
        });
    }
}
