<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPayoutOfAffiliateWebsites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('alter table affiliate_websites modify payout DOUBLE(10,3) DEFAULT 0');
        DB::connection('secondary')->statement('alter table affiliate_websites modify payout DOUBLE(10,3) DEFAULT 0');
        // Schema::table('affiliate_websites', function (Blueprint $table) {
        //     $table->double('payout',10,3)->change();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
