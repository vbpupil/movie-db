<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\MovieImport;
use Maatwebsite\Excel\Facades\Excel;

class MovieImportController extends Controller
{
    public function store()
    {
        Excel::import(new MovieImport, storage_path('Imports/movies.csv'));

        return response('All done!');
    }
}
