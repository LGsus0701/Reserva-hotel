@extends('layouts.app')

@section('content')
    <h2>Agregar Servicio a la Reserva #{{ $reserva->id_reserva }}</h2>

    <form action="{{ route('reservaservicios.store', $reserva->id_reserva) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_servicio">Servicio</label>
            <select name="id_servicio" id="id_servicio" class="form-control" required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id_servicio }}">{{ $servicio->descripcion }} - ${{ $servicio->precio }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Servicio</button>
    </form>
@endsection
