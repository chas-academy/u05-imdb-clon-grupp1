<?php

namespace Database\Seeders;

use App\Models\Watchlist;
use Illuminate\Database\Seeder;

class WatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //private $watchlist = [];

    public function run()
    {
        foreach ((range(1, 10)) as $index) {
            Watchlist::create([
                'user_id' => rand(1, 10), 'movie_id' => rand(1, 10)
            ]);
        }
    }
}
