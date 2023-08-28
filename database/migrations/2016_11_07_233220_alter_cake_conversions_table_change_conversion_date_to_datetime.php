<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCakeConversionsTableChangeConversionDateToDatetime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cake_conversions', function (Blueprint $table) {
            $table->dateTime('conversion_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cake_conversions', function (Blueprint $table) {
            $table->date('conversion_date')->change();
        });
    }
}
