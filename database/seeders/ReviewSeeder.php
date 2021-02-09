<?php

namespace Database\Seeders;

use App\Models\Review;
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
                'user_id' => rand(1, 10), 'movie_id' => rand(1, 10), 'review' => Str::random(10), 'rating' => rand(1, 10)
            ]);
        }
    }
}
