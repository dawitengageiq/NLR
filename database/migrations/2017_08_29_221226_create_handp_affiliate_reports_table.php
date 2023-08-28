<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandpAffiliateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handp_affiliate_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned()->index();
            $table->integer('campaign_id')->unsigned()->index();
            $table->string('s1',100)->nullable();
            $table->integer('lead_count')->default(0);
            $table->double('received',15,8)->default(0.0);
            $table->double('payout',15,8)->default(0.0);
            $table->date('created_at');

            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
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
        Schema::drop('handp_affiliate_reports');
    }
}
