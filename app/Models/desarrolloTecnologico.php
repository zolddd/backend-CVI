<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desarrolloTecnologico extends Model
{
    use HasFactory;

    protected $fillable=[
            "Nombre_desarrollo",            
            "Tipo_desarrollo",
            "Documentos_respaldo",
            "Objetivo",
            "Resumen",
            "Rol",
            "Area",
            "Campo",
            "Disciplina",
            "Subdisciplina",
            "Generacion_valor",
            "Formacion_RRHH",
            "Id.Usuario_beneficiario",
            "Aplicacion_conocimeinto",
            "Teorico-practico_original",
            "Id.Innvacion_implementado",
            "Problema_resuelve",
            "Analisis_pertenencia",
            "Linea_investigacion"
    ];

}
