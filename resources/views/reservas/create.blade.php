@extends('layouts.app')

@section('title', 'Crear Reserva')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Nueva Reserva</h1>

        <form action="{{ route('reservas.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Cliente -->
            <div>
                <label for="id_cliente" class="block font-medium text-gray-700 mb-1">Cliente</label>
                <select name="id_cliente" id="id_cliente" required class="w-full border border-gray-300 rounded px-3 py-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Habitación -->
            <div>
                <label for="id_habitacion" class="block font-medium text-gray-700 mb-1">Habitación</label>
                <select name="id_habitacion" id="id_habitacion" required class="w-full border border-gray-300 rounded px-3 py-2">
                    @foreach($habitaciones as $habitacion)
                        <option value="{{ $habitacion->id_habitacion }}">{{ $habitacion->numero_habitacion }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha de ingreso -->
            <div>
                <label for="fecha_ingreso" class="block font-medium text-gray-700 mb-1">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" required class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <!-- Fecha de salida -->
            <div>
                <label for="fecha_salida" class="block font-medium text-gray-700 mb-1">Fecha de Salida</label>
                <input type="date" name="fecha_salida" id="fecha_salida" required class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <!-- Estado -->
            <div>
                <label for="estado" class="block font-medium text-gray-700 mb-1">Estado</label>
                <select name="estado" id="estado" required class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="Reservada">Reservada</option>
                    <option value="Activa">Activa</option>
                    <option value="Cancelada">Cancelada</option>
                    <option value="Finalizada">Finalizada</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center">
                <a href="{{ route('reservas.index') }}" class="text-gray-600 hover:text-blue-500">← Volver</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
@endsection
