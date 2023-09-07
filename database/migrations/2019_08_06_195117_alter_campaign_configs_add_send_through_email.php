<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCampaignConfigsAddSendThroughEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_configs', function (Blueprint $table) {
            $table->boolean('email_sent')->default(0);
            $table->string('email_to', 250)->nullable();
            $table->string('email_title', 80)->nullable();
            $table->string('email_body', 250)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_configs', function (Blueprint $table) {
            $table->dropColumn(['email_sent', 'email_to', 'email_title', 'email_body']);
        });
    }
}
