<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'born' => intval($this->faker->year),
            'movie'=> $this->faker->word,
        ];
    }
}
