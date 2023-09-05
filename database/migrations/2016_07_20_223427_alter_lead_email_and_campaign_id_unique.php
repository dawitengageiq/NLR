<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterLeadEmailAndCampaignIdUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->unique(['lead_email', 'campaign_id'], 'leads_lead_email_campaign_id_unique_key');
            $table->index(['lead_email', 'campaign_id'], 'leads_lead_email_campaign_id_index');
            $table->index(['campaign_id', 'affiliate_id'], 'leads_campaign_id_affiliate_id_index');
            $table->index('lead_status', 'leads_lead_status_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropUnique('leads_lead_email_campaign_id_unique_key');
            $table->dropIndex('leads_lead_email_campaign_id_index');
            $table->dropIndex('leads_campaign_id_affiliate_id_index');
            $table->dropIndex('leads_lead_status_index');
        });
    }
}
