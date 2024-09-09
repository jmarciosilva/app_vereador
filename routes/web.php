<?php

use App\Http\Controllers\EmployeeController;
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

// employees
Route::get('/index-employee/{team}', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/show-employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/create-employee/{team}', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/store-employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('edit-employee/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/update-employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/destroy-employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

