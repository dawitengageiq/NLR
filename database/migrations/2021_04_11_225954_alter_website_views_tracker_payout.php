<?php

use Illuminate\Database\Migrations\Migration;

class AlterWebsiteViewsTrackerPayout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('alter table websites_view_tracker modify payout DOUBLE(10,3) DEFAULT 0');
        DB::connection('secondary')->statement('alter table websites_view_tracker modify payout DOUBLE(10,3) DEFAULT 0');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
