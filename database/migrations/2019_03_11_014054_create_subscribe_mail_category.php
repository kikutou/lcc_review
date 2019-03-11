<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeMailCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_mail_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscribe_mail_id');
            $table->foreign('subscribe_mail_id')->references('id')->on('subscribe_mails');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('mtb_categories');
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
        Schema::dropIfExists('subscribe_mail_category');
    }
}
