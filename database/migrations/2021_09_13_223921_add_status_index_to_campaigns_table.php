<?php

use Illuminate\Database\Migrations\Migration;

class AddStatusIndexToCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `campaigns` ADD INDEX `status_index` (`status`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
