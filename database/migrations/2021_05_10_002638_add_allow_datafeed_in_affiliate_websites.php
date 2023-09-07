<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAllowDatafeedInAffiliateWebsites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->boolean('allow_datafeed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->dropColumn('allow_datafeed');
        });
    }
}
