<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('manage_content', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('description')->nullable();
            $table->text('type_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('manage_content');
    }
};
