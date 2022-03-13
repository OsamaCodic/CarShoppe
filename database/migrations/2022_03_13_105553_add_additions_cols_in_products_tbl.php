<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionsColsInProductsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('colours')->after('varients')->nullable();
            $table->string('dimensions')->after('colours')->nullable();
            $table->integer('weight')->after('dimensions')->nullable();
            $table->string('transmission')->after('weight')->nullable();
            $table->string('gears')->after('transmission')->nullable();
            $table->integer('top_speed')->after('gears')->nullable();
            $table->integer('price')->after('top_speed')->nullable();
            $table->integer('fuel_tank_capacity')->after('price')->nullable();
            $table->boolean('status')->after('display_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('colours');
            $table->dropColumn('dimensions');
            $table->dropColumn('weight');
            $table->dropColumn('transmission');
            $table->dropColumn('gears');
            $table->dropColumn('top_speed');
            $table->dropColumn('price');
            $table->dropColumn('fuel_tank_capacity');
            $table->dropColumn('status');
        });
    }
}
