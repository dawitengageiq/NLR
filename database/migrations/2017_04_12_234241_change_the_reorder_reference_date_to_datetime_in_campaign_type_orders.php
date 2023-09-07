<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
