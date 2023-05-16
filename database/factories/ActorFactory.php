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
        $age = $this->faker->numberBetween(10, 90);

        return [
            'name' => $this->faker->name,
            'age' => $age,
            'acting_debut' => Carbon::now()->subDays(365 * ($age + rand(1, 20)))->format('Y'),
        ];
    }
}
