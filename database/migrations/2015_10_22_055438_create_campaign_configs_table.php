<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_configs', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->string('post_url', 1000)->nullable();
            $table->string('post_header', 2000)->nullable();
            $table->string('post_data', 3000)->nullable();
            $table->string('post_data_fixed_value', 3000)->nullable();
            $table->string('post_data_map', 6000)->nullable();
            $table->string('post_method', 20)->nullable();
            $table->string('post_success', 200)->nullable();
            $table->string('ping_url', 1000)->nullable();
            $table->string('ping_success', 200)->nullable();
            $table->timestamps();

            $table->primary('id');
            $table->foreign('id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_configs');
    }
}
