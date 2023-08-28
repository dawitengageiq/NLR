<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateWebsiteReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_website_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('website_id')->unsigned()->index();
            $table->double('payout',15,8)->default(0.0);
            $table->integer('count')->default(0);
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('affiliate_website_reports');
    }
}
