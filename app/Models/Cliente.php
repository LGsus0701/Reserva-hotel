<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'id_cliente',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'tipo_documento',
        'numero_documento',
        'correo',
        'telefono',
    ];

    public $timestamps = false;

    
}
