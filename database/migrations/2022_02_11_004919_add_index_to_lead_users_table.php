<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToLeadUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_users', function (Blueprint $table) {
            $table->index("email");
            $table->index("first_name");
            $table->index("last_name");
            $table->index("zip");
            $table->index("state");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_users', function (Blueprint $table)
        {
            $table->dropIndex(['email']);
            $table->dropIndex(['first_name']);
            $table->dropIndex(['last_name']);
            $table->dropIndex(['zip']);
            $table->dropIndex(['state']);
        });
    }
}
