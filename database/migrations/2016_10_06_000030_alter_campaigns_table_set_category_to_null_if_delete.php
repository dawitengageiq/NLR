<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCampaignsTableSetCategoryToNullIfDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {

            $table->dropForeign('campaigns_category_id_foreign');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function ($table) {
            $table->dropForeign('campaigns_category_id_foreign');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
