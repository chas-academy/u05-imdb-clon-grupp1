<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Profile;
use App\Models\Profile_user;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilePivot extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfilePivot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movies_id' => function () {
                return Movie::factory()->create();
            },
            'profiles_id' => function () {
                return Profile::factory()->create();
            }
        ];
    }
}
