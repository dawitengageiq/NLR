<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterWebsiteViewTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites_view_tracker', function (Blueprint $table) {
            $table->string('email', 50)->index()->change();
            $table->string('status', 50)->default('active')->index()->after('email');
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
            $table->dropColumn(['email', 'status']);
        });
    }
}
