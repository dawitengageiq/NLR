<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAffiliateWebsitesAddRevenueTrackerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->integer('revenue_tracker_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->dropColumn('revenue_tracker_id');
        });
    }
}
