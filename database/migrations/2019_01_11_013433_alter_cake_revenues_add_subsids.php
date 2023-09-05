<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCakeRevenuesAddSubsids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cake_revenues', function (Blueprint $table) {
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('s4')->nullable();
            $table->string('s5')->nullable();

            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('cake_revenues');
            if (array_key_exists('cake_revenues_unique_index', $indexesFound)) {
                $table->dropUnique('cake_revenues_unique_index');
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
        Schema::table('cake_revenues', function (Blueprint $table) {
            $table->dropColumn(['s1', 's2', 's3', 's4', 's5']);
        });
    }
}
