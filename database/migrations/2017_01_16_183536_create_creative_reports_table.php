<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreativeReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('path_id')->unsigned()->index()->nullable();
            $table->integer('campaign_id')->unsigned()->index()->nullable();
            $table->integer('creative_id')->index()->unsigned()->nullable();
            $table->integer('views')->default(0);
            $table->integer('lead_count')->default(0);
            $table->float('revenue')->default(0.0);
            $table->date('date')->nullable();

            $table->foreign('path_id')->references('id')->on('paths')->onDelete('set null');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('set null');
            $table->foreign('creative_id')->references('id')->on('campaign_creatives')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('creative_reports');
    }
}
