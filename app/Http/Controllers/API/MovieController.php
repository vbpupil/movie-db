<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends BaseAPIController
{
    public function index()
    {
        return response()->json(
            [
                'success' => true,
                'data' => MovieResource::collection(Movie::paginate(self::PER_PAGE))
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'genre' => ['nullable', 'string'],
            'release_year' => ['nullable', 'int'],
        ]);

        return response()->json(
            [
                'success' => true,
                'data' => new MovieResource(Movie::create($data))
            ]
        );
    }

    public function show(Movie $movie)
    {
        $movie->load(['actors','characters']);

        return response()->json(
            [
                'success' => true,
                'data' => new MovieResource($movie)
            ]
        );
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([

        ]);

        $movie->update($request->validated());

        return new MovieResource($movie);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->json();
    }
}
