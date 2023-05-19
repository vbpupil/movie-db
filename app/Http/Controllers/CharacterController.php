<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        return CharacterResource::collection(Character::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'character' => ['required'],
            'movie_id' => ['required', 'integer'],
            'actor_id' => ['required', 'integer'],
        ]);

        return new CharacterResource(Character::create($request->validated()));
    }

    public function show(Character $character)
    {
        return new CharacterResource($character);
    }

    public function update(Request $request, Character $character)
    {
        $request->validate([
            'character' => ['required'],
            'movie_id' => ['required', 'integer'],
            'actor_id' => ['required', 'integer'],
        ]);

        $character->update($request->validated());

        return new CharacterResource($character);
    }

    public function destroy(Character $character)
    {
        $character->delete();

        return response()->json();
    }
}
