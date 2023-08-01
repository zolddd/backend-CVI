<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gradoAcademico extends Model
{
    use HasFactory;
    protected $fillable =[
        "Titulo",
        "Nivel_escolaridad",
        "Estatus",
        "Area",
        "Campo",
        "Disciplina",
        "Subdisciplina",
        "Cedula",
        "Opciones_Titulacion",
        "Fecha_Obtencion",
        "Institucion"
    ];
}
