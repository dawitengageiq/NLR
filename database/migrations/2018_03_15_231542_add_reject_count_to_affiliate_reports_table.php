<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRejectCountToAffiliateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_reports', function (Blueprint $table) {
            $table->integer('reject_count')->default(0)->after('lead_count');
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
            $table->dropColumn('reject_count');
        });
    }
}
