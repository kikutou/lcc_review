<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCategoryToCategoryNameToMtbCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mtb_categories', function (Blueprint $table) {
            if (Schema::hasColumn('mtb_categories', 'category'))
            {
                $table->renameColumn("category", "category_name");
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mtb_categories', function (Blueprint $table) {
            //
        });
    }
}
