<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    protected $model = Character::class;

    public function definition(): array
    {
        return [
            'character' => $this->faker->word(),
            'movie_id' => $this->faker->randomNumber(),
            'actor_id' => $this->faker->randomNumber(),
        ];
    }
}
