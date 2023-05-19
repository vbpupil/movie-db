<?php

use App\Http\Controllers\API\ActorController;

Route::get('/', [ActorController::class, 'index'])->name('index');
Route::get('/{actor}', [ActorController::class, 'show'])->name('show');
Route::post('/create', [ActorController::class, 'store'])->name('create');
