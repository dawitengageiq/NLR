<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZipMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zip', 8)->unique();
            $table->string('city', 25);
            $table->string('state', 2);
            $table->string('area_code', 5);
            $table->string('time_zone', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zip_masters');
    }
}
