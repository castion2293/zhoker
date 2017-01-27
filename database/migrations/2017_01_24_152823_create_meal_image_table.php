<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->index()->unsigned();
            $table->integer('image_id')->index()->unsigned();
        });

        Schema::table('meal_image', function(Blueprint $table) {
             $table->foreign('meal_id')->references('id')->on('meals');
             $table->foreign('image_id')->references('id')->on('images');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meal_image');
    }
}
