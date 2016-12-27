<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->index()->unsigned();
            $table->integer('category_id')->index()->unsigned();
        });

        Schema::table('meal_category', function(Blueprint $table) {
             $table->foreign('meal_id')->references('id')->on('meals');
             $table->foreign('category_id')->references('id')->on('categories');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meal_category');
    }
}
