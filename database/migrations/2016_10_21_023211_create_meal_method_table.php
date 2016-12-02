<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_method', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->unsigned();
            //$table->foreign('meal_id')->references('id')->on('meals');

            $table->integer('method_id')->unsigned();
            //$table->foreign('method_id')->references('id')->on('methods');
        });

        Schema::table('meal_method', function(Blueprint $table) {
             $table->foreign('meal_id')->references('id')->on('meals');
             $table->foreign('method_id')->references('id')->on('methods');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meal_method');
    }
}
