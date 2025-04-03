<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::get('/habitaciones',[HabitacionController::class, 'index'])->name('habitaciones');