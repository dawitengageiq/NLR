<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->integer('mixed_coreg_order_by')->default(1);
            $table->boolean('mixed_coreg_order_status');
            $table->integer('mixed_coreg_campaign_views');
            $table->boolean('mixed_coreg_default_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->dropColumn(['mixed_coreg_order_by', 'mixed_coreg_order_status', 'mixed_coreg_campaign_views', 'mixed_coreg_default_order']);
        });
    }
};
