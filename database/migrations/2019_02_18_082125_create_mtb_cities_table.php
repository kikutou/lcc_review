<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mtb_country_id');
            $table->foreign('mtb_country_id')->references('id')->on('mtb_countries');
            $table->text('value');
            $table->integer('rank');
            $table->softDeletes();
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
        Schema::dropIfExists('mtb_cities');
    }
}
