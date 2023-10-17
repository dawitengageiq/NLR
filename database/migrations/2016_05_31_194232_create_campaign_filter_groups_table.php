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
        Schema::create('campaign_filter_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->index();
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_filter_groups');
    }
};
