<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPageViewStatsAdsmith extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_view_statistics', function (Blueprint $table) {
            $table->integer('ads')->default(0)->after('rex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_view_statistics', function (Blueprint $table) {
            $table->dropColumn(['ads']);
        });
    }
}
