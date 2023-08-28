<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTheReorderReferenceDateToDatetimeInCampaignTypeOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_type_orders', function (Blueprint $table) {
            $table->dateTime('reorder_reference_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_type_orders', function (Blueprint $table) {
            $table->date('reorder_reference_date')->change();
        });
    }
}
