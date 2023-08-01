<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diplomadosImpartidos extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "Nombre_diplomado",
        "Nombre_curso",
        "AÑO",
        "Horas_totales",
        "Area",
        "Campo",
        "Disciplina",
        "Subdisciplina"
    ];
}
