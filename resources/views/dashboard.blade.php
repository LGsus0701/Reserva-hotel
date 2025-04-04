@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Habitaciones Ocupadas</h3>
            <p class="text-2xl">{{ $habitaciones_ocupadas }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Ingresos Hoy</h3>
            <p class="text-2xl">$3,200</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Clientes Registrados</h3>
            <p class="text-2xl">120</p>
        </div>
    </div>
@endsection