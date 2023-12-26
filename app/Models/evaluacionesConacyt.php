<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluacionesConacyt extends Model
{
    protected $table = 'evaluaciones_conacyt';
    use HasFactory;


    protected $fillable=[
        "nombre_programa",
        "fecha_asignacion",
        "fecha_aceptacion",
        "fecha_evaluacion",
        "descripcion",        
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
