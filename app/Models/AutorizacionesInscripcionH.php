<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionesInscripcionH extends Model
{
     use  HasFactory;

    protected $table = 'autorizaciones_inscripcion_h_s';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'integer';

    protected $fillable = [
        'periodo',
        'no_de_control',
        'tipo_de_autorizacion',
        'motivo_autorizacion',
        'quien_autoriza',
        'fecha_hora_autoriza',
        'materia_afectada',
        'cantidad',
    ];

        protected $casts = [
        'fecha_hora_autoriza' => 'datetime',

     ];

    

}

