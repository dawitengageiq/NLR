<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebistesViewTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webistes_view_tracker', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('website_id')->unsigned()->index();
            $table->string('email', 50);
            $table->tinyInteger('status')->unsigned();
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
        Schema::drop('webistes_view_tracker');
    }
}
