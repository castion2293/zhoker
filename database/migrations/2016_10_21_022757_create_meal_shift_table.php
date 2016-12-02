<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('meal_shift', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->unsigned();
            // $table->foreign('meal_id')->references('id')->on('meals');

            $table->integer('shift_id')->unsigned();
            // $table->foreign('shift_id')->references('id')->on('shitfs');
        });

        //  Schema::table('meal_shift', function(Blueprint $table) {
        //      $table->foreign('meal_id')->references('id')->on('meals');
        //      $table->foreign('shift_id')->references('id')->on('shitfs');
        //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meal_shift');
    }
}
