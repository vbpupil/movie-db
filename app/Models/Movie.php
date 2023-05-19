<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actors_movies')->orderBy('name');
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
