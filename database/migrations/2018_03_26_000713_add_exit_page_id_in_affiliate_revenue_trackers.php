<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExitPageIdInAffiliateRevenueTrackers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->integer('exit_page_id')->unsigned()->index()->nullable();
            $table->foreign('exit_page_id')->references('id')->on('campaigns')->onDelete('set null');
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
            $table->dropForeign('affiliate_revenue_trackers_exit_page_id_foreign');
            $table->dropColumn('exit_page_id');
        });
    }
}
