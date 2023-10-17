<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_action_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->index()->nullable();
            $table->integer('sub_section_id')->unsigned()->index()->nullable();
            $table->integer('reference_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('change_severity')->unsigned()->index();
            $table->longText('summary')->nullable();
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_action_logs');
    }
};
