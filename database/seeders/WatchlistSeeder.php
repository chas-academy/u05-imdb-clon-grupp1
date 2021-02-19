<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
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
                'user_id' => User::inRandomOrder()->value('id'), 'movies_id' => Movie::inRandomOrder()->value('id')
            ]);
        }
    }
}
