<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFtpDirectoryToCampaignConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_configs', function (Blueprint $table) {
            $table->text('ftp_directory')->nullable();
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
            $table->dropColumn('ftp_directory');
        });
    }
}
