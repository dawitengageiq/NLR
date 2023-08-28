<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFtpColumnsInCampaignConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_configs', function (Blueprint $table) {
            $table->string('ftp_host', 150)->nullable();
            $table->integer('ftp_port')->unsigned()->nullable();
            $table->integer('ftp_timeout')->unsigned()->nullable();
            
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
            $table->dropColumn(['ftp_host','ftp_port','ftp_timeout']);
        });
    }
}
