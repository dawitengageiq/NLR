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
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->integer('failed_count')->default(0)->after('reject_count');
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
            $table->dropColumn('failed_count');
        });
    }
};
