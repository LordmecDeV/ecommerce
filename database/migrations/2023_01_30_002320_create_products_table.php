<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->text('image_product_1')->nullable();
            $table->text('image_product_2')->nullable();
            $table->text('image_product_3')->nullable();
            $table->text('image_product_4')->nullable();
            $table->text('image_product_5')->nullable();
            $table->text('image_product_6')->nullable();
            $table->text('image_product_7')->nullable();
            $table->text('image_product_8')->nullable();
            $table->text('image_product_9')->nullable();
            $table->text('image_product_10')->nullable();
            $table->text('price');
            $table->text('status');
            $table->text('tag')->nullable();
            $table->string('sku')->unique();
            $table->text('type_product');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
