<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'budget' => $this->faker->numberBetween(5, 5000),
            'status' => array_rand(['released', 'pre-release']),
        ];
    }
}
