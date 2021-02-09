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
        // $review = [
        //     ['user_id' => rand(1, 10), 'movie_id' => rand(1, 10), 'review' => Str::random(10), 'rating' => rand(1, 10)]
        // ];

        for ($a = 0; $a < 10; $a++) {
            $review[] = [
                'user_id' => rand(1, 10), 'movie_id' => rand(1, 10), 'review' => Str::random(10), 'rating' => rand(1, 10)
            ];
        }

        foreach ($review as $a) {
            Review::create($a);
        }
    }
}
