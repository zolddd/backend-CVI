<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patentes extends Model
{
    protected $table = 'patentes';
    use HasFactory;

    protected $fillable=[
        "nombre",
        "tipo_patente",
        "estado_patente",
        "numero_tramite",
        "fecha_solicitud",
        "fecha_registro",
        "numero_registro",
        "expediente",
        "clasificacion_wipo",
        "resumen",
        "explotacion_industrial",
        "year_publicacion",
        "pais",
        "usuario_benficiario",
        "conocimiento_teorico",
        "innovacion_implementada",
        "problema_resuelve",
        "analisis_pertinencia",
        "linea_investigacion",
        "numero_solicitud",
        "registro_internacional",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
