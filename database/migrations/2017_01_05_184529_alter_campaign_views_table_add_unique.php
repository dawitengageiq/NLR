<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignViewsTableAddUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_views', function (Blueprint $table) {
            $table->unique(['campaign_id','session'],'campaign_views_campaign_id_session_unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_views', function (Blueprint $table) {
            $table->dropUnique('campaign_views_campaign_id_session_unique_key');
        });
    }
}
