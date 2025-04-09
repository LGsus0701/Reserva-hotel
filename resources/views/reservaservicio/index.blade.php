@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Servicios para la Reserva #{{ $reserva->id_reserva }}</h2>
    
    <a href="{{ route('reservaservicios.create', $reserva->id_reserva) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-400 mb-4 inline-block">Agregar Servicio</a>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 text-sm font-medium text-gray-600">Servicio</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600">Cantidad</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600">Total</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservaServicios as $reservaServicio)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $reservaServicio->servicio->descripcion }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $reservaServicio->cantidad }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">${{ $reservaServicio->total }}</td>
                        <td class="px-4 py-2 text-sm">
                            <form action="{{ route('reservaservicios.destroy', [$reserva->id_reserva, $reservaServicio->id_reserva_servicio]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-400" onclick="return confirm('¿Eliminar este servicio?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
