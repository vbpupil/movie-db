<?php

namespace Tests\Feature\API\Requests\Movie;

use App\Models\Actor;
use App\Models\Character;
use App\Models\Movie;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MovieTest extends TestCase
{
    public function test_you_can_retrieve_an_movie_from_the_api(): void
    {
        $movieA = Movie::factory()->create();

        $this->get(Route('movies.show', ['movie' => $movieA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($movieA) {
                return $json
                    ->where('success', true)
                    ->where('data.id', $movieA->id)
                    ->where('data.title', $movieA->title)
                    ->where('data.genre', $movieA->genre)
                    ->where('data.release_year', intval($movieA->release_year));
            });
    }

    public function test_a_movie_has_actors(): void
    {
        $movieA = Movie::factory()->has(
            Actor::factory()->count(4), 'actors',
        )->create();

        $this->get(Route('movies.show', ['movie' => $movieA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($movieA) {
                return $json->where('success', true)
                    ->has('data.actors', 4);
            });
    }

    public function test_a_movie_has_characters(): void
    {
        $movieA = Movie::factory()->create();
        Actor::factory()->has(
            Character::factory(['movie_id' => $movieA->id]), 'characters',
        )->count(2)->create();

        $this->get(Route('movies.show', ['movie' => $movieA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($movieA) {
                return $json
                    ->where('success', true)
                    ->has('data.characters', 2);
            });
    }

    public function test_you_can_add_an_actor_to_the_api(): void
    {
        $this->assertCount(0, Movie::all());

        $movieData = [
            'title' => 'Sharknado',
            'genre' => 'Action',
            'release_year' => 2003
        ];

        $this->post(route('movies.create'), $movieData)
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($movieData) {
                return $json
                    ->where('success', true)
                    ->where('data.title', $movieData['title'])
                    ->where('data.genre', $movieData['genre'])
                    ->where('data.release_year', $movieData['release_year'])
                    ->etc();
            });
    }
}
