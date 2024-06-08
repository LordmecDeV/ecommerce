<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkCollectionToManageContentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('manage_content', function (Blueprint $table) {
            $table->string('link_collection')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('manage_content', function (Blueprint $table) {
            $table->dropColumn('link_collection');
        });
    }
}
