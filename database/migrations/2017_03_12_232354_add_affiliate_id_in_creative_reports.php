<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAffiliateIdInCreativeReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creative_reports', function (Blueprint $table) {
            $table->integer('affiliate_id')->unsigned()->nullable()->index();
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creative_reports', function (Blueprint $table) {
            $table->dropForeign('creative_reports_affiliate_id_foreign');
            $table->dropColumn(['affiliate_id']);
        });
    }
}
