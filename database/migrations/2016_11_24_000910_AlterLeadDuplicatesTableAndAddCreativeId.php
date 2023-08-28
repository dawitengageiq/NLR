<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLeadDuplicatesTableAndAddCreativeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_duplicates', function (Blueprint $table) {
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
        Schema::table('lead_duplicates', function (Blueprint $table) {
            $table->dropForeign('lead_duplicates_creative_id_foreign');
            $table->dropColumn('creative_id');
        });
    }
}
