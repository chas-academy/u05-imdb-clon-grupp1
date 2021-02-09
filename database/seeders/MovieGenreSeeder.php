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

        for ($a = 0; $a < 10; $a++) {
            $moviegenre[] = [
                'movie_id' => rand(1, 10), 'movie_id' => rand(1, 10), 'genre_id' => rand(1, 10), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        foreach ($moviegenre as $a) {
            DB::table('movie_genre')->insert($a);
        }
    }
}
