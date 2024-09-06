<?php

use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Teams
Route::get('/index-team', [TeamController::class, 'index'])->name('teams.index');
Route::get('/show-team/{team}', [TeamController::class, 'show'])->name('teams.show');
Route::get('/create-team', [TeamController::class, 'create'])->name('teams.create');
Route::post('/store-team', [TeamController::class, 'store'])->name('teams.store');
Route::get('/edit-team/{team}', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('/update-team/{team}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/destroy-team/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

