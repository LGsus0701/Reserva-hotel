@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Editar Servicio</h2>

    <form action="{{ route('servicios.update', $servicio->id_servicio) }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded px-3 py-2" required>{{ $servicio->descripcion }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Precio (S/)</label>
            <input type="number" step="0.01" name="precio" value="{{ $servicio->precio }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('servicios.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Actualizar</button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Editar Servicio</h2>

    <form action="{{ route('servicios.update', $servicio->id_servicio) }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded px-3 py-2" required>{{ $servicio->descripcion }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Precio (S/)</label>
            <input type="number" step="0.01" name="precio" value="{{ $servicio->precio }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('servicios.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Actualizar</button>
        </div>
    </form>
</div>
@endsection
