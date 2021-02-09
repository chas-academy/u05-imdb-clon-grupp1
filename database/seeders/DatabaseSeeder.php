<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement kolla foreign_key avstängd medans seeders körs
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::factory(10)->create();
        Movie::factory(10)->create();
        $this->call(GenreSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(WatchlistSeeder::class);
        $this->call(MovieGenreSeeder::class);
        // Review::factory(10)->create();
        // Genre::factory(10)->create();
        // Watchlist::factory(10)->create();

        // DB::statement aktivt igen
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
