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
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->boolean('allow_datafeed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('affiliate_websites', function (Blueprint $table) {
            $table->dropColumn('allow_datafeed');
        });
    }
};
