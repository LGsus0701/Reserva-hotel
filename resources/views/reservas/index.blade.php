@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
    <h1 class="text-xl font-bold mb-4">Lista de Reservas</h1>

    <a href="{{ route('reservas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Reserva</a>

    <table class="w-full border">
        <thead>
            <tr class="bg-green-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Cliente</th>
                <th class="border border-gray-300 px-4 py-2">Habitación</th>
                <th class="border border-gray-300 px-4 py-2">Ingreso</th>
                <th class="border border-gray-300 px-4 py-2">Salida</th>
                <th class="border border-gray-300 px-4 py-2">Estado</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $reserva->id_reserva }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido_paterno }} {{ $reserva->cliente->apellido_materno }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reserva->habitacion->numero_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reserva->fecha_ingreso }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reserva->fecha_salida }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reserva->estado }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <!-- Boton editar -->
                        <a href="{{ route('reservas.edit', $reserva->id_reserva) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                        
                        <!-- Boton eliminar -->
                        <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
