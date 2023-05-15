<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorMoviesSeeder extends Seeder
{
    public function run()
    {
        $actor = Actor::where('name', 'like', 'Roy%')->first();
        $film = Movie::where('title', '=', 'Jaws')->first();
        DB::insert('insert into actors_movies (actor_id, movie_id, `character`) values (?,?,?)', [$actor->id, $film->id, 'Sherrif Martin Brody']);

        $actor = Actor::where('name', 'like', 'John%')->first();
        $film = Movie::where('title', '=', 'Spaceballs')->first();
        DB::insert('insert into actors_movies (actor_id, movie_id, `character`) values (?,?,?)', [$actor->id, $film->id, 'Barf']);

        $film = Movie::where('title', '=', 'Uncle Buck')->first();
        DB::insert('insert into actors_movies (actor_id, movie_id, `character`) values (?,?,?)', [$actor->id, $film->id, 'Buck Russell']);

        $actor = Actor::where('name', 'like', 'Michael%')->first();
        Movie::where('title', 'like', 'Back%')->get()->each(function($film) use($actor){
            DB::insert('insert into actors_movies (actor_id, movie_id, `character`) values (?,?,?)', [$actor->id, $film->id, 'Marty McFly']);
        });

    }
}
