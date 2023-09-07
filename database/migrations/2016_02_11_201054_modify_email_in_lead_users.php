<?php

use Illuminate\Database\Migrations\Migration;

class ModifyEmailInLeadUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //SHOW INDEX FROM lead_users
        Schema::table('lead_users', function ($table) {
            $table->dropUnique('lead_users_email_unique');
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
            $table->unique('email');
        });
    }
}
