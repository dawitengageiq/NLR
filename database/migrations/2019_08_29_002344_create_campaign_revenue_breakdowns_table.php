<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignRevenueBreakdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_revenue_breakdowns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->index();
            $table->float('revenue')->default(0.0);
            $table->integer('records')->default(0);
            $table->float('average_revenue')->default(0.0);
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_revenue_breakdowns');
    }
}
