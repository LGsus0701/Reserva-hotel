<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener la cantidad de habitaciones ocupadas
        $habitaciones_ocupadas = Habitacion::where('estado', 'Ocupada')->count();

        // Pasar la cantidad de habitaciones ocupadas a la vista
        return view('dashboard', compact('habitaciones_ocupadas'));
}

}