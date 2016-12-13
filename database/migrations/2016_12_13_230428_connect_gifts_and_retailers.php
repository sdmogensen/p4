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

            # Remove the field associated with the old way we were storing authors
            # Whether you need this or not depends on whether your books table is built with an authors column
            # $table->dropColumn('author');

            # Add a new INT field called `author_id` that has to be unsigned (i.e. positive)
            $table->integer('retailer_id')->unsigned();

            # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
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

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('gifts_retailer_id_foreign');

            $table->dropColumn('retailer_id');
        });
    }
}
