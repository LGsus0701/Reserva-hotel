<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    protected $fillable = [
        // 'id_reserva',
        'id_cliente',
        'id_habitacion',
        'fecha_ingreso',
        'fecha_salida',
        'estado'
    ];

    public $timestamps = false;

    //relacion con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    //relacion con habitacion
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'id_habitacion');
    }

    public function reservaServicios()
    {
        return $this->hasMany(ReservaServicio::class, 'id_reserva');
    }

}
