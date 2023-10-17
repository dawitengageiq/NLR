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
        Schema::create('campaign_full_rejection_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->index();
            $table->integer('total_count')->default(0);
            $table->integer('reject_count')->default(0);
            $table->integer('acceptable_reject_count')->default(0);
            $table->integer('duplicate_count')->default(0);
            $table->integer('filter_count')->default(0);
            $table->integer('prepop_count')->default(0);
            $table->integer('other_count')->default(0);
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_full_rejection_statistics');
    }
};
