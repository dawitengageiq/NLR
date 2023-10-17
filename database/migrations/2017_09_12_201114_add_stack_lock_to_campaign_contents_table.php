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
        Schema::table('campaign_contents', function (Blueprint $table) {
            $table->boolean('stack_lock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('campaign_contents', function (Blueprint $table) {
            $table->dropColumn('stack_lock');
        });
    }
};
