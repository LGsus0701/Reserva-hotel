@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Editar Empleado</h2>

    <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="w-full border p-2" required>
        <input type="text" name="apellido paterno" value="{{ $empleado->apellido_paterno }}" class="w-full border p-2" required>
        <input type="text" name="apellido materno" value="{{ $empleado->apellido_materno }}" class="w-full border p-2" required>
        <input type="email" name="correo" value="{{ $empleado->correo }}" class="w-full border p-2" required>
        <input type="text" name="telefono" value="{{ $empleado->telefono }}" class="w-full border p-2" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('empleados.index') }}" class="text-gray-500 ml-4">Cancelar</a>
    </form>
</div>
@endsection
