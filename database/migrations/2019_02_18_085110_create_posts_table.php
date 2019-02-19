<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('writer')->nullable();
            $table->date('createdate');
            $table->unsignedInteger('brand_id');
              $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedInteger('mtb_category_id');
              $table->foreign('mtb_category_id')->references('id')->on('mtb_categories');
            $table->unsignedInteger('admin_id');
              $table->foreign('admin_id')->references('id')->on('admins');
            $table->datetime('start_time')->nullable();
            $table->datetime('finish_time')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('posts');
    }
}
