@extends('layouts.app')

@section('title', 'Habitaciones Ocupadas')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Habitaciones Ocupadas</h1>

    <!-- Tabla de habitaciones ocupadas -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Número</th>
                <th class="border border-gray-300 px-4 py-2">Tipo</th>
                <th class="border border-gray-300 px-4 py-2">Descripción</th>
                <th class="border border-gray-300 px-4 py-2">Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($habitaciones as $habitacion)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->id_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->numero_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->tipoHabitacion->nombre ?? 'No definido' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->descripcion }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        S/{{ number_format($habitacion->tipoHabitacion->precio ?? 0, 2) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No hay habitaciones ocupadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
