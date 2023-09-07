<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAffiliateIdAsForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_revenue_trackers', function (Blueprint $table) {
            $table->integer('affiliate_id')->unsigned()->nullable()->change();
            $table->integer('revenue_tracker_id')->unsigned()->nullable()->change();
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('set null');
            $table->foreign('revenue_tracker_id')->references('id')->on('affiliates')->onDelete('set null');

            $table->index(['revenue_tracker_id', 'affiliate_id'], 'affiliate_revenue_trackers_revenue_tracker_id_affiliate_id_index');
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
            $table->dropForeign('affiliate_revenue_trackers_affiliate_id_foreign');
            $table->dropForeign('affiliate_revenue_trackers_revenue_tracker_id_foreign');
            $table->dropIndex('affiliate_revenue_trackers_revenue_tracker_id_affiliate_id_index');
        });
    }
}
