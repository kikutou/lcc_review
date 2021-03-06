<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->text('flight_number');
            $table->unsignedInteger('mtb_start_airport_id');
            $table->foreign('mtb_start_airport_id')->references('id')->on('mtb_airports');
            $table->unsignedInteger('mtb_destination_airport_id');
            $table->foreign('mtb_destination_airport_id')->references('id')->on('mtb_airports');
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('destination_time');
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
        Schema::dropIfExists('flights');
    }
}
