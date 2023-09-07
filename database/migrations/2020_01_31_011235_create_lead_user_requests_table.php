<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadUserRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('lead_user_request')) {
            Schema::create('lead_user_request', function (Blueprint $table) {
                $table->increments('id');
                $table->string('request_type', 55)->nullable();
                $table->string('email', 75);
                $table->string('first_name', 50);
                $table->string('last_name', 50);
                $table->string('state', 25)->nullable();
                $table->string('city', 25)->nullable();
                $table->string('zip', 8)->nullable();
                $table->string('address', 255)->nullable();
                $table->timestamp('request_date');
                $table->text('subscribed_campaigns')->nullable();
                $table->boolean('is_removed');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lead_user_request');
    }
}
