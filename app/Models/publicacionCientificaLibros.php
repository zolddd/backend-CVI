<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicacionCientificaLibros extends Model
{

    protected $table = 'publicacion_cientifica_libros';

    use HasFactory;

    protected $fillable=[
        "ISBN",
        "titulo_libro",
        "pais",
        "idioma",
        "year_publicacion",
        "volumen",
        "tomo",
        "tiraje",
        "DOI",
        "numero_paginas",
        "palabra_clave1",
        "palabra_clave2",
        "palabra_clave3",
        "editorial",
        "numero_edicion",
        "year_edicion",
        "ISBN_traducido",
        "titulo_traducido",
        "idioma_traducido",
        "apoyo_CONACYT",
        "area",
        "campo",
        "disciplina",
        "subdisciplina",
        "rol_participacion",
        "estatus_publicacion",
        "objetivo",
        "dictaminado",
        "url_cita",
        "cita_a",
        "cita_b",
        "total_citas",
        "id_investigador"
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
