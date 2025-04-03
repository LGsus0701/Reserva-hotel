<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    protected $table = 'tipo_habitaciones';
    protected $primaryKey = 'id_tipo_habitacion';
    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad',
        'precio',
    ];

    public $timestamps = false;


    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'id_tipo_habitacion',);
    }
}
