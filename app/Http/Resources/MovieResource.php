<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Movie */
class MovieResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'genre' => $this->genre,
            'release_year' => $this->release_year,
            'actors' => ActorsInAMovieResource::collection($this->actors),
            'characters' => CharacterResource::collection($this->characters),
//            'record_created' => $this->created_at->format('Y-m-d'),
        ];
    }
}
