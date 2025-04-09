@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Registrar Servicio</h2>

    <form action="{{ route('servicios.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Precio (S/)</label>
            <input type="number" step="0.01" name="precio" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('servicios.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar</button>
        </div>
    </form>
</div>
@endsection
