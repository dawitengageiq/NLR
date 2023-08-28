<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAffiliateRevenueTrackerTableCampaignOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->dropColumn(['default_order','mixed_coreg_default_order']);
            $table->integer('mixed_coreg_campaign_limit');
            $table->boolean('order_type');
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
            $table->boolean('default_order');
            $table->boolean('mixed_coreg_default_order');
            $table->dropColumn(['mixed_coreg_campaign_limit','order_type']);
        });
    }
}
