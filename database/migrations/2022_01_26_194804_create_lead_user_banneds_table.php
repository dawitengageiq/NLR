<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadUserBannedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_users_banned', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',30)->index()->nullable();
            $table->string('last_name',30)->index()->nullable();
            $table->string('email',50)->index()->nullable();
            $table->string('phone',20)->index()->nullable();
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
        Schema::drop('lead_users_banned');
    }
}
