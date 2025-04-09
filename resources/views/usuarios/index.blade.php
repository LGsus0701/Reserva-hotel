@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<h1 class="text-xl font-bold mb-4">Lista de Usuarios</h1>

<a href="{{ route('usuarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Usuarios</a>

<table class="w-full border">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Empleado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach($usuarios as $usuario)
                <tr class="text-center border-t">
                    <td>{{ $usuario->nombre_usuario }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>{{ $usuario->empleado->nombre }} {{ $usuario->empleado->apellido }}</td>
                    <td class="flex gap-2 justify-center">

                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>

                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST"class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este Usuario?')">
                            @csrf
                             @method('DELETE')
                             <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
@endsection