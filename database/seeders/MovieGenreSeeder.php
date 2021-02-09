<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $movieIDs = DB::table('movies')->pluck('id');
        // $movieIDs = DB::table('movies')->pluck('id');


        foreach ((range(1, 10)) as $index) {
            DB::table('movie_genre')->insert(
                [
                    'movie_id' => rand(1, 10), 'movie_id' => rand(1, 10), 'genre_id' => rand(1, 10), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
                ]
            );
        }
    }
}
