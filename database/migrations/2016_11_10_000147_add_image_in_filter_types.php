<?php

use Illuminate\Database\Migrations\Migration;

class AddImageInFilterTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filter_types', function ($table) {
            $table->string('image', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_users', function ($table) {
            $table->dropColumn(['image']);
        });
    }
}
