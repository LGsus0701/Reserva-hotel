@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Listado de Clientes</h2>
        <a href="{{ route('clientes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition">
            + Nuevo Cliente
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 divide-y divide-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
            <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-4 py-2">Nombre completo</th>
                    <th class="px-4 py-2">Tipo Documento</th>
                    <th class="px-4 py-2">N° Documento</th>
                    <th class="px-4 py-2">Correo</th>
                    <th class="px-4 py-2">Teléfono</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800 divide-y divide-gray-200">
                @foreach($clientes as $cliente)
                <tr>
                    <td class="px-4 py-2">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</td>
                    <td class="px-4 py-2">{{ $cliente->tipo_documento }}</td>
                    <td class="px-4 py-2">{{ $cliente->numero_documento }}</td>
                    <td class="px-4 py-2">{{ $cliente->correo }}</td>
                    <td class="px-4 py-2">{{ $cliente->telefono }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-medium transition">
                            Editar
                        </a>
                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" onsubmit="return confirm('¿Eliminar este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium transition">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
