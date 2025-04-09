@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Registrar Nuevo Empleado</h2>

    <form action="{{ route('empleados.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="w-full border p-2" required>
        <input type="text" name="apellido paterno" placeholder="Apellido Paterno" class="w-full border p-2" required>
        <input type="text" name="apellido materno" placeholder="Apellido Materno" class="w-full border p-2" required>
        <input type="email" name="correo" placeholder="Correo" class="w-full border p-2" required>
        <input type="text" name="telefono" placeholder="Teléfono" class="w-full border p-2" required>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('empleados.index') }}" class="text-gray-500 ml-4">Cancelar</a>
    </form>
</div>
@endsection
