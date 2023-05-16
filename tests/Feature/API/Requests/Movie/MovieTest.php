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
                    ->where('data.budget', $actorA->budget)
//                    ->where('data.status', $actorA->status)
                    ->where('data.record_created', $actorA->created_at->format('Y-m-d'));
            });
    }

    public function test_you_can_add_an_actor_to_the_api(): void
    {
        $this->assertCount(0, Movie::all());

        $movieData = [
            'title' => 'Sharknado',
            'budget' => 50000,
        ];

        $this->post(route('movies.create'),$movieData)
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($movieData) {
                return $json
                    ->where('success', true)
                    ->where('data.title', $movieData['title'])
                    ->where('data.budget', $movieData['budget'])
                    ->etc();
            });
    }
}
