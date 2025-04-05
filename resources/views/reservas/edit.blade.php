@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Editar Reserva</h1>

    <form action="{{ route('reservas.update', $reserva->id_reserva) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <!-- Cliente -->
        <div>
            <label for="id_cliente" class="block font-semibold mb-1">Cliente:</label>
            <select name="id_cliente" id="id_cliente" class="w-full border rounded px-3 py-2" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $reserva->id_cliente == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Habitación -->
        <div>
            <label for="id_habitacion" class="block font-semibold mb-1">Habitación:</label>
            <select name="id_habitacion" id="id_habitacion" class="w-full border rounded px-3 py-2" required>
                @foreach($habitaciones as $habitacion)
                    <option value="{{ $habitacion->id_habitacion }}" {{ $reserva->id_habitacion == $habitacion->id_habitacion ? 'selected' : '' }}>
                        {{ $habitacion->numero_habitacion }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Fecha de Entrada -->
        <div>
            <label for="fecha_ingreso" class="block font-semibold mb-1">Fecha de Ingreso:</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{ $reserva->fecha_ingreso }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Fecha de Salida -->
        <div>
            <label for="fecha_salida" class="block font-semibold mb-1">Fecha de Salida:</label>
            <input type="date" name="fecha_salida" id="fecha_salida" value="{{ $reserva->fecha_salida }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Estado -->
        <div>
            <label for="estado" class="block font-semibold mb-1">Estado:</label>
            <select name="estado" id="estado" class="w-full border rounded px-3 py-2" required>
                <option value="Reservada" {{ $reserva->estado == 'Reservada' ? 'selected' : '' }}>Reservada</option>
                <option value="Activa" {{ $reserva->estado == 'Activa' ? 'selected' : '' }}>Activa</option>
                <option value="Cancelada" {{ $reserva->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                <option value="Finalizada" {{ $reserva->estado == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
            </select>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('reservas.index') }}" class="text-gray-600 hover:text-blue-500">← Volver</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar Reserva</button>
        </div>
    </form>
@endsection
