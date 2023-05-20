<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'character'
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actors_movies')->orderByDesc('release_year');
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

//    public function character()
//    {
//        return $this->hasOneThrough(
//            Character::class,
//            Movie::class,
//            'id',
//            'movie_id',
//            'id',
//            'id'
//        );
//    }

//    public function character(int $movieId)
//    {
//        $movie = $this->movies->filter(fn($movie) => $movie->id === $movieId);
//
//        if ($movie = $movie->first()) {
//            return $movie->characters->filter(fn($character) => $character->actor_id === $this->id);
//        }
//    }
}
