<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClicksVsRegistrationRemoveSubidsUniqueIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clicks_vs_registration_statistics', function (Blueprint $table) {

            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('clicks_vs_registration_statistics');
            if(array_key_exists("subids_index", $indexesFound)) {
                $table->dropUnique("subids_index");
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('clicks_vs_registration_statistics', function (Blueprint $table) {
        //     $table->unique(['affiliate_id', 'revenue_tracker_id', 's1', 's2', 's3', 's4', 's5', 'created_at'], 'subids_index');
        // });
    }
}
