<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desarrolloSoftware extends Model
{
    use HasFactory;

    protected $fillable=[
        "Titulo",
        "Tipo_desarrollo",
        "Derechos_autor",
        "Pais",
        "Derechos_Autor2",
        "Pais2",
        "Horas_hombre",
        "Fecha_Inicio",
        "Fecha_fin",
        "Costo",
        "Rol_participacion",
        "Beneficiario",
        "Objectivo",
        "Resumen",
        "Contribucion",
        "Generacion_valor",
        "Formacion_RRRHH",
        "Logros",
        "Generacion_conocimiento_tp",
        "Identificacion_innocacion_imple",
        "Problema_resuelve",
        "Analisi_pertinencia",
        "Linea_investigacion"
    ];

}
