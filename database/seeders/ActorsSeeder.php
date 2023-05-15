<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorsSeeder extends Seeder
{
    public function run()
    {
        Actor::factory()->create(['name'=>'John Candy']);
        Actor::factory()->create(['name'=>'Michael J Fox']);
        Actor::factory()->create(['name'=>'Roy Scheider']);
    }
}
