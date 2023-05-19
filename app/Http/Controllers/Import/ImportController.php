<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function index()
    {
        return view('import', []);
    }
}
