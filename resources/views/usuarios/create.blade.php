@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Registrar Usuario</h2>

    <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Empleado:</label>
            <select name="id_empleado" class="border p-2 w-full">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" class="border p-2 w-full">
        </div>

        <div>
            <label>Contraseña:</label>
            <input type="password" name="contrasena" class="border p-2 w-full">
        </div>

        <div>
            <label>Rol:</label>
            <input type="text" name="rol" class="border p-2 w-full">
        </div>

        <button class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection
