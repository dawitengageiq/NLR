<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterAffiliateReportsAddS1ToS5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('s4')->nullable();
            $table->string('s5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->dropColumn(['s1', 's2', 's3', 's4', 's5']);
        });
    }
}
