<?php

use Illuminate\Database\Migrations\Migration;

class ModifyPriorityInCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function ($table) {
            $table->integer('priority')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function ($table) {
            $table->integer('priority')->change();
        });
    }
}
