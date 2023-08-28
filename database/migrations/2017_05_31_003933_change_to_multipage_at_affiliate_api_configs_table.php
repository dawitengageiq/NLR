<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeToMultipageAtAffiliateApiConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_api_configs', function (Blueprint $table) {
            $table->renameColumn('one_loading', 'multi_page');
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
            $table->dropColumn('multi_page');
        });
    }
}
