<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Character */
class CharacterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'character' => $this->character,
            'movie_id' => $this->movie_id,
            'actor_id' => $this->actor_id,
        ];
    }
}
