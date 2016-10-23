<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileToChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chefs', function (Blueprint $table) {
            $table->string('profile_img')->nullable()->after('zip_code');
            $table->text('store_description')->nullable()->after('zip_code');
            $table->string('store_name')->nullable()->after('zip_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chefs', function (Blueprint $table) {
            $table->dropColumn('profile_img');
            $table->dropColumn('store_description');
            $table->dropColumn('store_name');
        });
    }
}
