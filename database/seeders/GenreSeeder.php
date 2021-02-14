<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = [
            ['genre_name' => 'Comedy'],
            ['genre_name' => 'Action'],
            ['genre_name' => 'Drama'],
            ['genre_name' => 'Fantasy'],
            ['genre_name' => 'Horror'],
            ['genre_name' => 'Mystery'],
            ['genre_name' => 'Romance'],
            ['genre_name' => 'Thriller'],
            ['genre_name' => 'Sci-fi'],
        ];

        foreach ($genre as $a) {
            Genre::create($a);
        }
    }
}
