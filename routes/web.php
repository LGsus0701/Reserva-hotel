<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

//dashboard
Route::view('/dashboard', 'dashboard')->name('dashboard');

//habitaciones crud
Route::get('/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones.index');
Route::get('/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones.create');
Route::post('/habitaciones', [HabitacionController::class, 'store'])->name('habitaciones.store');
Route::get('/habitaciones/{id_habitacion}/edit', [HabitacionController::class, 'edit'])->name('habitaciones.edit');
Route::put('/habitaciones/{id_habitacion}', [HabitacionController::class, 'update'])->name('habitaciones.update');
Route::delete('/habitaciones/{id_habitacion}', [HabitacionController::class, 'destroy'])->name('habitaciones.destroy');
