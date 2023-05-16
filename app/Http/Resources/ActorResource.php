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
            'age' => $this->age,
            'acting_debut' => $this->acting_debut,
            'movies' => MoviesAnActorHasAppearedInResource::collection($this->movies),
            'record_created' => $this->created_at->format('Y-m-d'),
        ];
    }
}
