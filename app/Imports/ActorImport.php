<?php

namespace App\Imports;

use App\Models\Actor;
use Maatwebsite\Excel\Concerns\ToModel;

class ActorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Actor([
            'name' => $row[0],
            'born' => $row[1],
            'movie' => $row[2],
        ]);
    }
}
