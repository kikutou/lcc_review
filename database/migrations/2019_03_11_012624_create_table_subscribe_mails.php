<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubscribeMails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail',50)->unique();
            $table->string('token',20)->unique();
            $table->dateTime('subscribed_at');
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
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
        Schema::dropIfExists('table_subscribe_mails');
    }
}
