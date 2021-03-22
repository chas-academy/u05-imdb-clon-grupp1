<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreignids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        });

        Schema::table('genre_movies_pivot', function (Blueprint $table) {
            $table->unsignedBigInteger('movies_id');
            $table->unsignedBigInteger('genres_id');
        });

        Schema::table('watchlist_pivot', function (Blueprint $table) {
            $table->unsignedBigInteger('profiles_id');
            $table->unsignedBigInteger('movies_id');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movies_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
