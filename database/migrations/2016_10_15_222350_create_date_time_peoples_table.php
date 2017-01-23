<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateTimePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_time_peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->index()->unsigned();
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->string('date');
            $table->string('time');
            $table->string('end_time');
            $table->string('end_date');
            $table->tinyInteger('people_left');
            $table->tinyInteger('people_order')->default(0);
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
        Schema::dropIfExists('date_time_peoples');
    }
}
