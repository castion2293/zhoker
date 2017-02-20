<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('meal_id')->index()->unsigned();
            $table->integer('datetimepeople_id')->index()->unsigned();
            $table->integer('unite_price');
            $table->tinyInteger('people_order');
            $table->integer('price');
            $table->string('date');
            $table->string('time');
            $table->string('method');
            $table->boolean('checked')->default(0);
            $table->boolean('evaluated')->default(0);
            $table->integer('user_order_id')->index()->unsigned()->nullable();
            $table->integer('chef_order_id')->index()->unsigned()->nullable();
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
        Schema::dropIfExists('carts');
    }
}
