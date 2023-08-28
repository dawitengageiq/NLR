<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAffiliateApiConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_api_configs', function (Blueprint $table) {
            $table->string('campaign_type_order', 100)->default('[1, 2, 8, 13]')->change();
            $table->integer('display_limit')->default('20')->change();
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
            $table->dropColumn(['campaign_type_order', 'display_limit']);
        });
    }
}
