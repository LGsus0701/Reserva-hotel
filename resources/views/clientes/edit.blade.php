@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Editar Cliente</h2>

    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" value="{{ $cliente->apellido_paterno }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                <input type="text" name="apellido_materno" value="{{ $cliente->apellido_materno }}" class="w-full border rounded px-3 py-2" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                <input type="text" name="tipo_documento" value="{{ $cliente->tipo_documento }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Número de Documento</label>
                <input type="text" name="numero_documento" value="{{ $cliente->numero_documento }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="correo" value="{{ $cliente->correo }}" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <div class="w-full md:w-1/3">
            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-end gap-3 mt-4">
            <a href="{{ route('clientes.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Actualizar</button>
        </div>
    </form>
</div>
@endsection
