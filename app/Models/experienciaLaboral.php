<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experienciaLaboral extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "Puesto_desempeñado",
        "Institucion",
        "Institucion_catedra",
        "Empleo_actual",
        "Fecha_inicio",
        "Fecha_fin",
        "Nombramiento",
        "Logros",
        "Areas",
        "Campo",
        "Disciplina",
        "Subdisciplina",
        "id_investigador"
    ];
}
