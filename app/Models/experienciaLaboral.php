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
        "Fecha_inicio",
        "Fecha_fin",
        "Nombramiento",
        "Logros",
        "Areas",
        "Campo",
        "Disciplina",
        "Subdisciplina"
    ];
}
