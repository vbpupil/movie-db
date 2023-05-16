<?php

namespace Tests\Feature\API\Requests\Actor;

use App\Models\Actor;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    public function test_you_can_retrieve_actors_from_the_api(): void
    {
        $this->assertCount(0, Actor::all());

        Actor::factory()->create();
        Actor::factory()->create();

        $this->get(Route('actors.index'))
            ->assertOk()
            ->assertJson(function (AssertableJson $json) {
                return $json->where('success', true)
                    ->has('data', 2);
            });
    }
}
