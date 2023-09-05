<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAffiliateApiConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_api_configs', function (Blueprint $table) {
            $table->tinyInteger('one_loading')->default(0)->after('display_limit');
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
            $table->dropColumn('one_loading');
        });
    }
}
