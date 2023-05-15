<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return MovieResource::collection(Movie::all());
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return new MovieResource(Movie::create($request->validated()));
    }

    public function show(Movie $movie)
    {
        return new MovieResource($movie);
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
