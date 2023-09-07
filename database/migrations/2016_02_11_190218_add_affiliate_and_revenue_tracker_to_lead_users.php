<?php

use Illuminate\Database\Migrations\Migration;

class AddAffiliateAndRevenueTrackerToLeadUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_users', function ($table) {
            $table->integer('affiliate_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_users', function ($table) {
            $table->dropColumn(['affiliate_id', 'revenue_tracker_id']);
        });
    }
}
