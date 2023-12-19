<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\innovaion;

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
            "Id-Usuario_beneficiario",
            "Aplicacion_conocimeinto",
            "Teorico-practico_original",
            "Id-Innvacion_implementado",
            "Problema_resuelve",
            "Analisis_pertenencia",
            "Linea_investigacion",
            "id_investigador",
            // "id_innovacion",

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
