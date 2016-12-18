<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectGiftsAndRetailers extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->integer('retailer_id')->unsigned();
            $table->foreign('retailer_id')->references('id')->on('retailers');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->dropForeign('gifts_retailer_id_foreign');
            $table->dropColumn('retailer_id');
        });
    }
}
