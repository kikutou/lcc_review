<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbAirportStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_airport', function (Blueprint $table) {
            $table->increments('id');
            $table->text('airport_name');
            $table->unsignedInteger('mtb_city_id');
              $table->foreign('mtb_city_id')->references('id')->on('mtb_cities');
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
        Schema::dropIfExists('mtb_airport_status');
    }
}
