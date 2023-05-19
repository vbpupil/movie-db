<?php

namespace App\Http\Resources;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Actor */
class ActorResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'born' => $this->born,
            'movies' => MoviesAnActorHasAppearedInResource::collection($this->movies),
            'characters' => CharacterResource::collection($this->characters),
//            'record_created' => $this->created_at->format('Y-m-d'),
        ];
    }
}
