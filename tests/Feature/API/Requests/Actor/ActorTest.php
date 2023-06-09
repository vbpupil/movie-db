<?php

namespace Tests\Feature\API\Requests\Actor;

use App\Models\Actor;
use App\Models\Character;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ActorTest extends TestCase
{
    public function test_you_can_retrieve_an_actor_from_the_api(): void
    {
        $actorA = Actor::factory()->create();

        $this->get(Route('actors.show', ['actor' => $actorA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($actorA) {
                return $json
                    ->where('success', true)
                    ->where('data.id', $actorA->id)
                    ->where('data.name', $actorA->name)
                    ->where('data.born', $actorA->born);
            });
    }

    public function test_an_actor_has_movies(): void
    {
        $actorA = Actor::factory()->has(
            Movie::factory()->count(3), 'movies'
        )->create();

        $this->get(Route('actors.show', ['actor' => $actorA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($actorA) {
                return $json
                    ->where('success', true)
                    ->has('data.movies', 3);
            });
    }

    public function test_an_actor_has_characters(): void
    {
        $actorA = Actor::factory()->create();

        Movie::factory()->has(
            Character::factory(['actor_id' => $actorA->id]), 'characters'
        )->count(3)->create();

        $this->get(Route('actors.show', ['actor' => $actorA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($actorA) {
                return $json
                    ->where('success', true)
                    ->has('data.characters', 3);
            });
    }

    public function test_you_can_add_an_actor_to_the_api(): void
    {
        $this->assertCount(0, Actor::all());

        $actorData = [
            'name' => 'Marlon Brando',
            'born' => 1949,
        ];

        $this->post(route('actors.create'),$actorData)
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($actorData) {
                return $json
                    ->where('success', true)
                    ->where('data.name', $actorData['name'])
                    ->where('data.born', $actorData['born'])
                    ->etc();
            });
    }
}
