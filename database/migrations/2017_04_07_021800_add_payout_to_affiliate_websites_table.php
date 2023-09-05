<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPayoutToAffiliateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->float('payout')->after('website_description')->unsigned();
            //$table->float('payout')->change()->after('website_description');
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
            $table->dropColumn('payout');
        });
    }
}
