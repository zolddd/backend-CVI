<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capitulosPublicadosCientifica extends Model
{
    protected $table = 'capitulos_publicados_cientifica';
    use HasFactory;

    protected $fillable=[
        "ISBN",
        "titulo_libro",
        "editorial",
        "numero_edicion",
        "year_publicacion",
        "titulo_capitulo",
        "numero_capitulo",
        "de_pagina",
        "a_pagina",
        "DOI",
        "resumen",     
        "area",
        "campo",
        "disciplina",
        "subdisciplina",
        "apoyo_CONACYT",
        "rol_participacion",
        "estatus_publicacion",
        "objetivo",
        "dictaminado",
        "url_cita",
        "cita_a",
        "cita_b",
        "total_cita",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
