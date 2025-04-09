@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Editar Usuario</h2>

    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label>Empleado:</label>
            <select name="id_empleado" class="border p-2 w-full">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id_empleado }}" {{ $empleado->id_empleado == $usuario->id_empleado ? 'selected' : '' }}>
                        {{ $empleado->nombre }} {{ $empleado->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}" class="border p-2 w-full">
        </div>

        <div>
            <label>Rol:</label>
            <input type="text" name="rol" value="{{ $usuario->rol }}" class="border p-2 w-full">
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>
@endsection
