<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterPageViewStatisticsRemoveForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_view_statistics', function (Blueprint $table) {
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $foreigns = $sm->listTableForeignKeys('page_view_statistics');
            foreach ($foreigns as $fk) {
                if ($fk->getName() == 'page_view_statistics_affiliate_id_foreign') {
                    $table->dropForeign('page_view_statistics_affiliate_id_foreign');
                }
                if ($fk->getName() == 'page_view_statistics_revenue_tracker_id_foreign') {
                    $table->dropForeign('page_view_statistics_revenue_tracker_id_foreign');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
