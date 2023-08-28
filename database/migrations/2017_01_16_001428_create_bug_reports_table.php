<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bug_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reporter_name');
            $table->string('reporter_email',50);
            $table->string('bug_summary');
            $table->string('bug_description');
            $table->mediumText('evidences');
            $table->softDeletes();
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
        Schema::drop('bug_reports');
    }
}
