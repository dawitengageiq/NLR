<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteViewTrackerDuplicateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites_view_tracker_duplicate', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('website_id')->unsigned()->index();
            $table->string('email', 50);
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
        Schema::drop('websites_view_tracker_duplicate');
    }
}
