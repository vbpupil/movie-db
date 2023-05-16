<?php

namespace App\Http\Controllers;

use App\Enum\MovieStatuses;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json(
            [
                'success' => true,
                'data' => MovieResource::collection(Movie::all())
            ]
        );
    }

    public function store(Request $request)
    {
        $statuses = collect(MovieStatuses::values());

        $data = $request->validate([
            'title' => ['required', 'string'],
            'budget' => ['nullable', 'int'],
//            'status' => ['sometimes', Rule::in($statuses->implode(','))],
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
        $movie->load('actors');

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
