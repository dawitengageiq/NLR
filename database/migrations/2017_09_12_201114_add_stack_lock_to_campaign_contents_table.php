<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStackLockToCampaignContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_contents', function (Blueprint $table) {
            $table->boolean('stack_lock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_contents', function (Blueprint $table) {
            $table->dropColumn('stack_lock');
        });
    }
}
