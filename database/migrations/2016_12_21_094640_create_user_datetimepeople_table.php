<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDatetimepeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datetimepeople', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('datetimepeople_id')->index()->unsigned();
        });

         Schema::table('user_datetimepeople', function(Blueprint $table) {
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('datetimepeople_id')->references('id')->on('date_time_peoples');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_datetimepeople');
    }
}
