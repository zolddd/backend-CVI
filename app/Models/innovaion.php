<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class innovaion extends Model
{
    use HasFactory;
    protected $fillable=[
        "Nombre",
        "Fecha_fin",
        "Descripcion",
        "Tipo_innovacion",
        "Tipo_innovacion_OSLO",
        "PP_intelectual",
        "Potencial_cobertura",
        "Area",
        "Campo",
        "Disciplina",
        "Subdisciplina",
        "Monto_venta",
        "Volumen_produccion",
        "Empleados_directos",
        "Empleados_indirectos",
        "Usuario_beneficiario",
        "Generacion_conocimiento_tp",
        "Innovacion_Implementada",
        "Problema_resuelve",
        "Analisis_pertinencia",
        "Linea_investigacion",
        "Generacion_valor"
    ];
}
