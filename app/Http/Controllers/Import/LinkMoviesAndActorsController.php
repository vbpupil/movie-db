<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class LinkMoviesAndActorsController extends Controller
{
    public function store()
    {
        Actor::all()->each(function (Actor $actor) {
            $movie = Movie::where('title', $actor->movie)->first();

            if ($movie && $movie->exists())
                DB::table('actors_movies')->insert(
                    [
                        'actor_id' => $actor->id,
                        'movie_id' => $movie->id,
                    ]
                );
        });

        return response('Done!');
    }
}
