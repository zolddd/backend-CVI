<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\innovaion;

class desarrolloTecnologico extends Model
{
    use HasFactory;

    protected $fillable = [
        "Nombre_desarrollo",
        "Tipo_desarrollo",
        "Documentos_respaldo",
        "Objetivo",
        "Resumen",
        "Rol",
        "apoyo_CONACYT",
        "Sector_SCIAN",
        "Subsector_SCIAN",
        "Rama_SCIAN",
        "Subrama_SCIAN",
        "Clase_SCIAN",
        "Sector_OCDE",
        "Division_OCDE",
        "Grupo_OCDE",
        "Clase_OCDE",
        "Area",
        "Campo",
        "Disciplina",
        "Subdisciplina",
        "Generacion_valor",
        "Formacion_RRHH",
        "Id_usuario_beneficiario",
        "Aplicacion_conocimiento",
        "Teorico_practico_original",
        "Id_innvacion_implementado",
        "Problema_resuelve",
        "Analisis_pertenencia",
        "Linea_investigacion",
        "id_investigador",

    ];

    public function usuario()
    {
        // definir la relación con el usuario
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }

    // public function innovacion()
    // {
    //     // definir la relación con la iinovacion
    //     //un desarollo tiene una innovacion, relacion 1 a 1
    //     return $this->hasOne(innovaion::class);
    // }

}
