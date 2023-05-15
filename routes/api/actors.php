<?php

use App\Http\Controllers\ActorController;

Route::get('/', [ActorController::class, 'index'])->name('index');
Route::get('/{actor}', [ActorController::class, 'show'])->name('show');

