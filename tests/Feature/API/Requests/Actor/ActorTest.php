<?php

namespace Tests\Feature\API\Requests\Actor;

use App\Models\Actor;
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
                    ->where('data.age', $actorA->age)
                    ->where('data.acting_debut', intval($actorA->acting_debut))
                    ->where('data.record_created', $actorA->created_at->format('Y-m-d'));
            });
    }

    public function test_you_can_add_an_actor_to_the_api(): void
    {
        $this->assertCount(0, Actor::all());

        $actorData = [
            'name' => 'Marlon Brando',
            'age' => 53,
            'acting_debut' => 1965
        ];

        $this->post(route('actors.create'),$actorData)
            ->assertOk()
            ->assertJson(function (AssertableJson $json) use ($actorData) {
                return $json
                    ->where('success', true)
                    ->where('data.name', $actorData['name'])
                    ->where('data.age', $actorData['age'])
                    ->where('data.acting_debut', $actorData['acting_debut'])
                    ->etc();
            });
    }
}
