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
        Schema::table('newsletter', function (Blueprint $table) {
            $table->json('products_in_mail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('newsletter', function (Blueprint $table) {
            $table->dropColumn('products_in_mail');
        });
    }
};
