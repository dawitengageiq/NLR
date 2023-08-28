<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksVsRegistrationStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks_vs_registration_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned()->index();
            $table->integer('revenue_tracker_id')->unsigned()->index();
            $table->integer('registration_count')->default(0);
            $table->integer('clicks')->default(0);
            $table->double('percentage', 8, 8)->default(0.00000000);
            $table->date('created_at');

            $table->unique(['affiliate_id', 'revenue_tracker_id', 'created_at'], 'affiliate_tracker_date_unique_index');

            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clicks_vs_registration_statistics');
    }
}
