<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\ActorImport;
use Maatwebsite\Excel\Facades\Excel;

class ActorImportController extends Controller
{
    public function store()
    {
        Excel::import(new ActorImport, storage_path('Imports/actor.csv'));

        return response('All done!');
    }
}
