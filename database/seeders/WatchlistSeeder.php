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

        for ($a = 0; $a < 10; $a++) {
            $watchlist[] = [
                'user_id' => rand(1, 10), 'movie_id' => rand(1, 10)
            ];
        }

        foreach ($watchlist as $a) {
            Watchlist::create($a);
        }
    }
}
