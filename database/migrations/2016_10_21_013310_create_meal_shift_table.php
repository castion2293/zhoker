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
            $table->integer('meal_id')->index()->unsigned();
            $table->integer('shift_id')->index()->unsigned();
        });

         Schema::table('meal_shift', function(Blueprint $table) {
             $table->foreign('meal_id')->references('id')->on('meals');
             $table->foreign('shift_id')->references('id')->on('shifts');
         });
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
