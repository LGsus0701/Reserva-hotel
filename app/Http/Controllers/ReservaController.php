<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'habitacion'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $habitaciones = Habitacion::where('estado', 'Disponible')->get();
        return view('reservas.create', compact('clientes', 'habitaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_habitacion' => 'required',
            'fecha_ingreso' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_ingreso',
            'estado' => 'required',
        ]);
        

        Reserva::create($request->all());

        // Cambiar estado habitación a Reservada
        $habitacion = Habitacion::find($request->id_habitacion);
        $habitacion->estado = 'Reservada';
        $habitacion->save();

        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    public function edit(Reserva $reserva)
    {
        $clientes = Cliente::all();
        $habitaciones = Habitacion::all();
        return view('reservas.edit', compact('reserva', 'clientes', 'habitaciones'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_habitacion' => 'required',
            'fecha_ingreso' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_ingreso',
            'estado' => 'required',
        ]);

        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente.');
    }
}
