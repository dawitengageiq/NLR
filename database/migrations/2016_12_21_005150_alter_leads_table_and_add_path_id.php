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
        Schema::table('leads', function (Blueprint $table) {
            $table->integer('path_id')->index()->unsigned()->nullable()->after('creative_id');
            $table->foreign('path_id')->references('id')->on('paths')->onDelete('set null');
        });

        Schema::table('lead_duplicates', function (Blueprint $table) {
            $table->integer('path_id')->index()->unsigned()->nullable()->after('creative_id');
            $table->foreign('path_id')->references('id')->on('paths')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign('leads_path_id_foreign');
            $table->dropColumn('path_id');
        });

        Schema::table('lead_duplicates', function (Blueprint $table) {
            $table->dropForeign('lead_duplicates_path_id_foreign');
            $table->dropColumn('path_id');
        });
    }
};
