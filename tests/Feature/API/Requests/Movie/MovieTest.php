<?php

namespace Tests\Feature\API\Requests\Movie;

use App\Models\Movie;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MovieTest extends TestCase
{
    public function test_you_can_retrieve_an_actor_from_the_api(): void
    {
        $actorA = Movie::factory()->create();

        $this->get(Route('movies.show', ['movie' => $actorA->id]))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($actorA) {
                return $json
                    ->where('success', true)
                    ->where('data.id', $actorA->id)
                    ->where('data.title', $actorA->title)
                    ->where('data.genre', $actorA->genre)
                    ->where('data.release_year', intval($actorA->release_year));
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

        $this->post(route('movies.create'),$movieData)
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
