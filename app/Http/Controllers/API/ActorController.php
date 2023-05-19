<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends BaseAPIController
{
    public function index()
    {
        return response()->json(
            [
                'success' => true,
                'data' => ActorResource::collection(Actor::orderBy('name')->paginate(self::PER_PAGE))
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'born' => ['nullable', 'int'],
        ]);

        return response()->json(
            [
                'success' => true,
                'data' => new ActorResource(Actor::create($data))
            ]
        );
    }

    public function show(Actor $actor)
    {
        return response()->json(
            [
                'success' => true,
                'data' => new ActorResource($actor)
            ]
        );
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
