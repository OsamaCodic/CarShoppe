<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->integer('brand_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('model')->nullable();
            $table->string('description')->nullable();
            $table->integer('engine_cc')->nullable();
            $table->integer('no_of_doors')->nullable();
            $table->string('varients')->nullable();
            $table->integer('serial_nunber')->nullable();
            $table->integer('fuel_average')->nullable();
            
            $table->integer('display_order')->nullable();
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
        Schema::dropIfExists('products');
    }
}
