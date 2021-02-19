<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
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
        foreach ((range(1, 10)) as $index) {
            DB::table('movie_genre')->insert(
                [
                    'movies_id' => Movie::inRandomOrder()->value('id'), 'genre_id' => Genre::inRandomOrder()->value('id'), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
                ]
            );
        }
    }
}
