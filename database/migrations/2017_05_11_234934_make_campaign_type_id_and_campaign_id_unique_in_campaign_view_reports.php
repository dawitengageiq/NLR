<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeCampaignTypeIdAndCampaignIdUniqueInCampaignViewReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_view_reports', function (Blueprint $table) {
            $table->unique(['campaign_type_id', 'campaign_id'], 'campaign_type_id_campaign_id_unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_view_reports', function (Blueprint $table) {
            $table->dropUnique('campaign_type_id_campaign_id_unique_key');
        });
    }
}
