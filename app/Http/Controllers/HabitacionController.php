<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::with('tipoHabitacion')->get();
        return view('habitaciones', compact('habitaciones'));
    }
}
