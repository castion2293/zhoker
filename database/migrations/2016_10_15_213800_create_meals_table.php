<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chef_id')->index()->unsigned();
            $table->string('name');
            $table->integer('price');
            $table->integer('people_eaten')->default(0)->unsigned();
            $table->integer('people_eva')->default(0)->unsigned();
            $table->tinyInteger('evaluation')->default(0)->unsigned();
            $table->text('description');
            $table->string('cover_img')->default("");
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
        Schema::dropIfExists('meals');
    }
}
