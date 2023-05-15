<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    public function run()
    {
        Movie::factory()->create(['title'=>'Jaws']);
        Movie::factory()->create(['title'=>'Spaceballs']);
        Movie::factory()->create(['title'=>'Uncle Buck']);
        Movie::factory()->create(['title'=>'Back To The Future - Part 1']);
        Movie::factory()->create(['title'=>'Back To The Future - Part 2']);
        Movie::factory()->create(['title'=>'Back To The Future - Part 3']);
    }
}
