<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPayoutToWebsitesViewTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites_view_tracker', function (Blueprint $table) {
            $table->float('payout')->after('email')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('websites_view_tracker', function (Blueprint $table) {
            $table->dropColumn('payout');
        });
    }
}
