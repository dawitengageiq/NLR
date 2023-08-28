<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeInAffiliateApiConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_api_configs', function (Blueprint $table) {
            $table->tinyInteger('time_interval')->default(24)->after('one_loading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_api_configs', function (Blueprint $table) {
            $table->dropColumn('time_interval');
        });
    }
}
