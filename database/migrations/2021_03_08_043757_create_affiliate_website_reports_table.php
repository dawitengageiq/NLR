<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('affiliate_website_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('website_id')->unsigned()->index();
            $table->double('payout', 15, 8)->default(0.0);
            $table->integer('count')->default(0);
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('affiliate_website_reports');
    }
};
