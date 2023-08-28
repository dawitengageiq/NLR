<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFtpColumnsInCampaignConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_configs', function (Blueprint $table) {
            $table->boolean('ftp_sent')->default(0);
            $table->boolean('ftp_protocol')->nullable();
            $table->string('ftp_username',80)->nullable();
            $table->string('ftp_password', 150)->nullable();
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
            $table->dropColumn(['ftp_sent','ftp_protocol','ftp_username', 'ftp_password']);
        });
    }
}
