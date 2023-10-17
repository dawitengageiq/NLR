<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('alter table revenue_tracker_cake_statistics modify payout DOUBLE(10,3) DEFAULT 0');
        DB::connection('secondary')->statement('alter table revenue_tracker_cake_statistics modify payout DOUBLE(10,3) DEFAULT 0');
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
};
