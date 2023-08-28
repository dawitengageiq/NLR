<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLeadUserRequestAddTimestamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_user_request', function (Blueprint $table) {
            $table->tinyInteger('is_sent')->default(0);
            $table->tinyInteger('is_deleted')->default(0);
            $table->tinyInteger('is_reported')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_user_request', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->dropColumn(['is_sent', 'is_deleted', 'is_reported']);
        });
    }
}
