<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_and_size', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('type_product');
            $table->float('price');
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->float('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_and_size');
    }
};
