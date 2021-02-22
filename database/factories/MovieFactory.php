<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'actors' => $this->faker->name,
            'language' => $this->faker->languageCode,
            'release_date' => $this->faker->year,
            'img_path' => 'img/test.jpg',
            'trailer_path' => $this->faker->url,
            'top_rating' => $this->faker->numberBetween(1, 10),
        ];
    }
}
