<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadSentResultsArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_sent_results_archive', function (Blueprint $table) {
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
        Schema::drop('lead_sent_results_archive');
    }
}
