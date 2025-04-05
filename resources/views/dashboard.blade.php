@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Imagen decorativa -->
<div class="mb-6">
    <!-- <img src="https://cache.marriott.com/content/dam/marriott-renditions/CUZMC/cuzmc-exterior-0110-hor-wide.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1336px:*" -->
        <img src="https://quechuahotelcusco.com/img/hotel/quechua-hotel-cusco-exterior-galeria-3-1960.jpg" 
             alt="Hotel Dashboard" 
             class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>
    
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