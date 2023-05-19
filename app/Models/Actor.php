<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actors_movies')->orderByDesc('release_year');
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
