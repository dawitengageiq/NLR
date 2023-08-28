<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfitMarginToPrepopStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prepop_statistics', function (Blueprint $table) {
            $table->decimal('profit_margin', 8, 3)->after('prepop_with_errors_percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prepop_statistics', function (Blueprint $table) {
            $table->dropColumn('profit_margin');
        });
    }
}
