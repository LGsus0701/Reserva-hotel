@extends('layouts.app')

@section('title', 'Habitaciones')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Listado de Habitaciones</h1>
    
    <!-- Botón para agregar habitación -->
    <a href="{{ route('habitaciones.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Agregar Habitacion</a>

    <!-- Tabla de habitaciones -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Número</th>
                <th class="border border-gray-300 px-4 py-2">Tipo</th>
                <th class="border border-gray-300 px-4 py-2">Descripción</th>
                <th class="border border-gray-300 px-4 py-2">Precio</th>
                <th class="border border-gray-300 px-4 py-2">Estado</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($habitaciones as $habitacion)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->id_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->numero_habitacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->tipoHabitacion->nombre ?? 'No definido' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->descripcion }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        S/{{ number_format($habitacion->tipoHabitacion->precio ?? 0, 2) }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $habitacion->estado }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <!-- Botón para editar -->
                        <a href="{{ route('habitaciones.edit', $habitacion->id_habitacion) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                        
                        <!-- Formulario para eliminar -->
                        <form action="{{ route('habitaciones.destroy', $habitacion->id_habitacion) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
