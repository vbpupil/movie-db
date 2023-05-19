<?php

use App\Http\Controllers\Import\ActorImportController;
use App\Http\Controllers\Import\ImportController;
use App\Http\Controllers\Import\LinkMoviesAndActorsController;
use App\Http\Controllers\Import\MovieImportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('import', [ImportController::class, 'index']);
Route::get('import/actors', [ActorImportController::class, 'store']);
Route::get('import/movies', [MovieImportController::class, 'store']);
Route::get('import/link', [LinkMoviesAndActorsController::class, 'store']);
