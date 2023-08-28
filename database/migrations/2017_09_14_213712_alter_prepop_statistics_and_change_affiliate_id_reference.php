<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPrepopStatisticsAndChangeAffiliateIdReference extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prepop_statistics', function (Blueprint $table) {
            $table->dropForeign('prepop_statistics_affiliate_id_foreign');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prepop_statistics', function (Blueprint $table) {
            $table->dropForeign('prepop_statistics_affiliate_id_foreign');
            $table->foreign('affiliate_id')->references('affiliate_id')->on('affiliate_revenue_trackers')->onDelete('cascade');
        });
    }
}
