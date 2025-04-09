@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Lista de Empleados</h2>
    <a href="{{ route('empleados.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Nuevo Empleado</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">apellidoPaterno</th>
                <th class="border px-4 py-2">apellidoMaterno</th>
                <th class="border px-4 py-2">Correo</th>
                <th class="border px-4 py-2">Teléfono</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td class="border px-4 py-2">{{ $empleado->nombre }}</td>
                    <td class="border px-4 py-2">{{ $empleado->apellido_paterno }}</td>
                    <td class="border px-4 py-2">{{ $empleado->apellido_materno }}</td>
                    <td class="border px-4 py-2">{{ $empleado->correo }}</td>
                    <td class="border px-4 py-2">{{ $empleado->telefono }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" onsubmit="return confirm('¿Eliminar este empledo?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
