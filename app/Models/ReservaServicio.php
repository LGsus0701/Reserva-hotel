<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicio extends Model
{
    use HasFactory;

    protected $table = 'reserva_servicios'; // Especificamos la tabla si no sigue la convención de pluralización

    protected $fillable = [
        'id_reserva',
        'id_servicio',
        'cantidad',
        'total',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
