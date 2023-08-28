<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultOrderToAffiliateRevenueTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->boolean('default_order');
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
            $table->dropColumn('default_order');
        });
    }
}
