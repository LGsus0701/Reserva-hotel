@extends('layouts.app')

@section('title', 'Habitaciones Reservadas')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Habitaciones Disponibles</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Número</th>
                <th class="border border-gray-300 px-4 py-2">Tipo</th>
                <th class="border border-gray-300 px-4 py-2">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($habitaciones as $habitacion)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->id_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->numero_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->tipoHabitacion->nombre ?? 'No definido' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
