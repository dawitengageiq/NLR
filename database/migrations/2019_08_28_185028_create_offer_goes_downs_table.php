<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferGoesDownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_goes_downs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->index();
            $table->text('affiliates')->nullable();
            $table->float('revenue')->default(0.0);
            $table->date('date');
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
        Schema::drop('offer_goes_downs');
    }
}
