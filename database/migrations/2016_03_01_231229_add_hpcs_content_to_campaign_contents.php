<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('campaign_contents', function ($table) {
            $table->text('high_paying')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('campaign_contents', function ($table) {
            $table->dropColumn('high_paying');
        });
    }
};
