@extends('layouts.app')

@section('title', 'Agregar Habitación')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Agregar Nueva Habitación</h1>

    <form action="{{ route('habitaciones.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="numero_habitacion" class="block text-gray-700">Número de Habitación</label>
            <input type="text" id="numero_habitacion" name="numero_habitacion" value="{{ old('numero_habitacion') }}" class="w-full px-4 py-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="id_tipo_habitacion" class="block text-gray-700">Tipo de Habitación</label>
            <select id="id_tipo_habitacion" name="id_tipo_habitacion" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                <option value="">Seleccione un tipo</option>
                @foreach ($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id_tipo_habitacion }}" {{ old('id_tipo_habitacion') == $tipo->id_tipo_habitacion ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="estado" class="block text-gray-700">Estado</label>
            <select id="estado" name="estado" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                <option value="Disponible" {{ old('estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Ocupada" {{ old('estado') == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                <option value="Mantenimiento" {{ old('estado') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                <option value="reservada" {{ old('estado') == 'reservada' ? 'selected' : '' }}>Reservada</option>
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar Habitación
            </button>
        </div>
    </form>
</div>
@endsection
