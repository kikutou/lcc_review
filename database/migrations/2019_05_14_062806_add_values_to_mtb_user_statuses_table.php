<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddValuesToMtbUserStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mtb_user_statuses', function (Blueprint $table) {
            DB::table('mtb_user_statuses')->insert(
                array(
                    'id' => 1,
                    'value' => "仮登録",
                    'rank' => 1
                )
            );

            DB::table('mtb_user_statuses')->insert(
                array(
                    'id' => 2,
                    'value' => "本会員",
                    'rank' => 2
                )
            );

            DB::table('mtb_user_statuses')->insert(
                array(
                    'id' => 3,
                    'value' => "VIP",
                    'rank' => 3
                )
            );

            DB::table('mtb_user_statuses')->insert(
                array(
                    'id' => 4,
                    'value' => "退会",
                    'rank' => 4
                )
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mtb_user_statuses', function (Blueprint $table) {
            //
        });
    }
}
