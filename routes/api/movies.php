<?php

use App\Http\Controllers\API\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('index');
Route::get('/{movie}', [MovieController::class, 'show'])->name('show');
Route::post('/create', [MovieController::class, 'store'])->name('create');
