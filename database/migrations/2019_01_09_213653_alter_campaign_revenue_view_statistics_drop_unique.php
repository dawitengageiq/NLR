<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignRevenueViewStatisticsDropUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_revenue_view_statistics', function (Blueprint $table) {
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('campaign_revenue_view_statistics');
            if(array_key_exists("tracker_campaign_id_date", $indexesFound)) {
                $table->dropUnique("tracker_campaign_id_date");
            }

            // if(!array_key_exists("rev_subs_date_cmp", $indexesFound)) {
            //     $table->unique(['revenue_tracker_id','s1','s2','s3','s4','s5', 'campaign_id', 'created_at'], 'rev_subs_date_cmp');
            // }
            
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
            // $sm = Schema::getConnection()->getDoctrineSchemaManager();
            // $indexesFound = $sm->listTableIndexes('campaign_revenue_view_statistics');
            // if(array_key_exists("rev_subs_date_cmp", $indexesFound)) {
            //     $table->dropUnique("rev_subs_date_cmp");
            // }
        });
    }
}
