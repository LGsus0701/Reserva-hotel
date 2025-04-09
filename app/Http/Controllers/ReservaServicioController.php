<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\ReservaServicio;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ReservaServicioController extends Controller
{
   // Mostrar lista de servicios asociados a una reserva
   public function index($reservaId)
{
    $reserva = Reserva::findOrFail($reservaId);
    $reservaServicios = $reserva->reservaServicios;

    return view('reservaservicio.index', compact('reserva', 'reservaServicios'));
}



   // Crear un nuevo servicio para una reserva
   public function create($reservaId)
   {
       $reserva = Reserva::findOrFail($reservaId);
       $servicios = Servicio::all();
       
       return view('reservaservicios.create', compact('reserva', 'servicios'));
   }

   // Guardar el servicio para la reserva
   public function store(Request $request, $reservaId)
   {
       $request->validate([
           'id_servicio' => 'required|exists:servicios,id_servicio',
           'cantidad' => 'required|integer|min:1',
       ]);

       $servicio = Servicio::findOrFail($request->id_servicio);
       $total = $servicio->precio * $request->cantidad;

       ReservaServicio::create([
           'id_reserva' => $reservaId,
           'id_servicio' => $request->id_servicio,
           'cantidad' => $request->cantidad,
           'total' => $total,
       ]);

       return redirect()->route('reservaservicios.index', $reservaId)
                        ->with('success', 'Servicio agregado a la reserva con éxito');
   }

   // Eliminar un servicio de una reserva
   public function destroy($reservaId, $id)
   {
       $reservaServicio = ReservaServicio::findOrFail($id);
       $reservaServicio->delete();

       return redirect()->route('reservaservicios.index', $reservaId)
                        ->with('success', 'Servicio eliminado de la reserva');
   }
}
