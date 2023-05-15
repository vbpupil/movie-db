<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return ActorResource::collection(Actor::all());
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return new ActorResource(Actor::create($request->validated()));
    }

    public function show(Actor $actor)
    {
        return new ActorResource($actor);
    }

    public function update(Request $request, Actor $actor)
    {
        $request->validate([

        ]);

        $actor->update($request->validated());

        return new ActorResource($actor);
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return response()->json();
    }
}
