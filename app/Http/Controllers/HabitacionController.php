<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\TipoHabitacion;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::with('tipoHabitacion')->get();
        return view('habitaciones.index', compact('habitaciones')); // Aquí cambiamos a index
    }

    public function create()
    {
        $tiposHabitacion = TipoHabitacion::all(); // Para obtener los tipos de habitación
        return view('habitaciones.create', compact('tiposHabitacion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tipo_habitacion' => 'required',
            'numero_habitacion' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        Habitacion::create($request->all());

        return redirect()->route('habitaciones.index')->with('success', 'Habitación agregada exitosamente.');

    }

    public function edit($id)
    {
        $habitacion = Habitacion::find($id);
        $tiposHabitacion = TipoHabitacion::all(); // Para obtener los tipos de habitación
        return view('habitaciones.edit', compact('habitacion', 'tiposHabitacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tipo_habitacion' => 'required',
            'numero_habitacion' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $habitacion = Habitacion::find($id);
        $habitacion->update($request->all());

        return redirect()->route('habitaciones.index')->with('success', 'Habitación actualizada exitosamente');
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        $habitacion->delete();

        return redirect()->route('habitaciones.index')->with('success', 'Habitación eliminada exitosamente');
    }

    public function ocupadas()
    {
        // Obtener solo habitaciones ocupadas
        $habitaciones = Habitacion::where('estado', 'Ocupada')->with('tipoHabitacion')->get();

        return view('habitaciones.ocupadas', compact('habitaciones'));
    }

    // Habitaciones disponibles
    public function disponibles()
    {
        $habitaciones = Habitacion::where('estado', 'Disponible')->with('tipoHabitacion')->get();
        return view('habitaciones.disponibles', compact('habitaciones'));
    }
    

    // Habitaciones en mantenimiento
    public function mantenimiento()
    {
        $habitaciones = Habitacion::where('estado', 'Mantenimiento')->get();
        return view('habitaciones.mantenimiento', compact('habitaciones'));
    }


    // Habitaciones reservadas
    public function reservadas()
    {
        $habitaciones = Habitacion::where('estado', 'Reservada')->get();
        return view('habitaciones.reservadas', compact('habitaciones'));
    }

}
