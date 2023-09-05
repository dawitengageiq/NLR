<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterLeadsArchiveTableAndAddCreativeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads_archive', function (Blueprint $table) {
            $table->integer('creative_id')->index()->unsigned()->nullable()->after('affiliate_id');
            $table->foreign('creative_id')->references('id')->on('campaign_creatives')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads_archive', function (Blueprint $table) {
            $table->dropForeign('leads_archive_creative_id_foreign');
            $table->dropColumn('creative_id');
        });
    }
}
