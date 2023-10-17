<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaign_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->index();
            $table->integer('filter_type_id')->unsigned()->index();
            $table->string('value_text', 30)->nullable();
            $table->tinyInteger('value_min_integer')->nullable();
            $table->bigInteger('value_max_integer')->nullable();
            $table->date('value_min_date')->nullable();
            $table->date('value_max_date')->nullable();
            $table->time('value_min_time')->nullable();
            $table->time('value_max_time')->nullable();
            $table->boolean('value_boolean')->nullable();
            $table->text('value_array')->nullable();
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('filter_type_id')->references('id')->on('filter_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('campaign_filters');
    }
};
