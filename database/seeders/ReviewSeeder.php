<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach ((range(1, 10)) as $index) {
            Review::create([
                'user_id' => User::inRandomOrder()->value('id'), 'movies_id' => Movie::inRandomOrder()->value('id'), 'review' => Str::random(10), 'rating' => rand(1, 10)
            ]);
        }
    }
}
