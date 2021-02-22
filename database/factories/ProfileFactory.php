<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Profile;
use App\Models\Profile_user;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'image' => 'img/test.jpg',
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
