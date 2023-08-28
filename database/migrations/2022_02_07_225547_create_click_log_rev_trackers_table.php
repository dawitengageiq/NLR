<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickLogRevTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_log_rev_trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->index();
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
        Schema::drop('click_log_rev_trackers');
    }
}
