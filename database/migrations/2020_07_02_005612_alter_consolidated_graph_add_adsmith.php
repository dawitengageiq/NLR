<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterConsolidatedGraphAddAdsmith extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consolidated_graph', function (Blueprint $table) {
            
            $table->decimal('adsmith_revenue_vs_views', 8, 2)->unsigned()->default(0)->after('mp_per_views');
            $table->integer('adsmith_views')->unsigned()->default(0)->after('mp_per_views');
            $table->decimal('adsmith_revenue', 8, 3)->unsigned()->default(0)->after('mp_per_views');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consolidated_graph', function (Blueprint $table) {
            $table->dropColumn(['adsmith_revenue', 'adsmith_revenue_vs_views', 'adsmith_views']);
        });
    }
}
