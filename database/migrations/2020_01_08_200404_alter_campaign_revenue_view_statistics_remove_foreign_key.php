<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignRevenueViewStatisticsRemoveForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_revenue_view_statistics', function (Blueprint $table) {
            $table->dropForeign("campaign_revenue_view_statistics_campaign_id_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_revenue_view_statistics', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }
}
