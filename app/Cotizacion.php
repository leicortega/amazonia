<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

    protected $fillable = [
        'num_cotizacion', 'fecha', 'nombre', 'correo', 'telefono', 'departamento_origen', 'ciudad_origen', 'departamento_destino', 'ciudad_destino', 'fecha_ida', 'fecha_regreso', 'tipo_servicio', 'tipo_vehiculo', 'recorrido', 'descripcion', 'observaciones', 'combustible', 'conductor', 'peajes', 'cotizacion_por', 'valor_unitario', 'cantidad', 'total', 'trayecto_dos', 'responsable_id'
    ];
}

