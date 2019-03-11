<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeMailBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_mail_brand', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscribe_mail_id');
            $table->unsignedInteger('brand_id');

            $table->foreign('subscribe_mail_id')->references('id')->on('subscribe_mails');
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('subscribe_mail_brand');
    }
}
