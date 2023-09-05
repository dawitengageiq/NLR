<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadDataAdvsArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_data_advs_archive', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->text('value')->nullable();
            $table->timestamps();

            $table->primary('id');
            $table->foreign('id')->references('id')->on('leads_archive')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lead_data_advs_archive');
    }
}
