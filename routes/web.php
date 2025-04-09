<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservaServicioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//habitaciones crud
Route::get('/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones.index');
Route::get('/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones.create');
Route::post('/habitaciones', [HabitacionController::class, 'store'])->name('habitaciones.store');
Route::get('/habitaciones/{id_habitacion}/edit', [HabitacionController::class, 'edit'])->name('habitaciones.edit');
Route::put('/habitaciones/{id_habitacion}', [HabitacionController::class, 'update'])->name('habitaciones.update');
Route::delete('/habitaciones/{id_habitacion}', [HabitacionController::class, 'destroy'])->name('habitaciones.destroy');

// Rutas por estado
Route::get('/habitaciones/ocupadas', [HabitacionController::class, 'ocupadas'])->name('habitaciones.ocupadas');
Route::get('/habitaciones/disponibles', [HabitacionController::class, 'disponibles'])->name('habitaciones.disponibles');
Route::get('/habitaciones/mantenimiento', [HabitacionController::class, 'mantenimiento'])->name('habitaciones.mantenimiento');
Route::get('/habitaciones/reservadas', [HabitacionController::class, 'reservadas'])->name('habitaciones.reservadas');

//reservas crud
Route::resource('reservas', ReservaController::class);

// cliente crud

Route::resource('clientes', ClienteController::class);

// servicios crud

Route::resource('servicios', ServicioController::class);

// empleados crud
Route::resource('empleados', EmpleadoController::class);
//usuarios crud

Route::resource('usuarios', UsuarioController::class);

// reservaServicio

Route::prefix('reservas/{reservaId}/servicios')->group(function () {
    Route::get('/', [ReservaServicioController::class, 'index'])->name('reservaservicio.index');
    Route::get('/create', [ReservaServicioController::class, 'create'])->name('reservaservicios.create');
    Route::post('/', [ReservaServicioController::class, 'store'])->name('reservaservicios.store');
    Route::delete('/{id}', [ReservaServicioController::class, 'destroy'])->name('reservaservicios.destroy');
});





