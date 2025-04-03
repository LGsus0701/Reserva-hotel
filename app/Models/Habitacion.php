<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{


    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';
    protected $fillable = [
        //'id_habitacion',
        'id_tipo_habitacion',
        'numero_habitacion',
        'descripcion',
        'estado'

    ];

    public $timestamps = false;

    public function tipoHabitacion()
    {
        return $this-> belongsTo(TipoHabitacion::class, 'id_tipo_habitacion');
    }

}
