<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cron_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leads_queued')->default(0);
            $table->integer('leads_processed')->index()->default(0);
            $table->integer('leads_waiting')->index()->default(0);
            $table->dateTime('time_started')->index()->nullable();
            $table->dateTime('time_ended')->index()->nullable();
            $table->smallInteger('status')->index()->default(1);
            $table->text('lead_ids')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cron_histories');
    }
}
