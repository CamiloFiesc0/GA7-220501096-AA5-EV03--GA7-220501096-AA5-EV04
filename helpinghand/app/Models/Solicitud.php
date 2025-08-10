<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud'; // O 'solicitudes' si así la llamaste
    protected $primaryKey = 'codigo'; // Según tu tabla, el PK es codigo
    public $timestamps = false; // Si tu tabla no usa created_at/updated_at

    protected $fillable = [
        'codigo', 'descripcion', 'ubicacion', 'fecha', 'prioridad', 'pago', 'idusuario'
    ];
}
