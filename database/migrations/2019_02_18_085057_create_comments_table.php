<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedInteger('flight_id')->nullable();
            $table->foreign('flight_id')->references('id')->on('flights');
            $table->integer('service')->nullable();
            $table->integer('clean')->nullable();
            $table->integer('food')->nullable();
            $table->integer('seat')->nullable();
            $table->integer('entertainment')->nullable();
            $table->integer('cost_performance')->nullable();
            $table->string('comment', 500)->nullable();
            $table->unsignedInteger('mtb_inspect_status_id');
            $table->foreign('mtb_inspect_status_id')->references('id')->on('mtb_inspect_statuses');
            $table->text('inspect_memo')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
