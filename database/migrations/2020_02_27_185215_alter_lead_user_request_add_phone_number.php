<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterLeadUserRequestAddPhoneNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_user_request', function (Blueprint $table) {
            $table->string('phone_number', 75)->nullable();
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
            $table->dropColumn(['phone_number']);
        });
    }
}
