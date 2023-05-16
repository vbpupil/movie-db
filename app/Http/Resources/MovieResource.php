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
            'budget' => $this->budget,
            'status' => $this->status,
            'actors' => ActorsInAMovieResource::collection($this->actors),
            'record_created' => $this->created_at->format('Y-m-d'),
        ];
    }
}
