<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class difusionPublicacionArticulos extends Model
{
    protected $table = 'difusion_publicacion_articulos';

    use HasFactory;


    protected $fillable=[
        "ISSN_impreso",
        "ISSN_electronico",
        "DOI",
        "nombre_revista",
        "titulo_articulo",
        "num_revista",
        "vol_revista",
        "year_publicacion",
        "de_pagina",
        "a_pagina",
        "palabra_clave1",
        "palabra_clave2",
        "palabra_clave3",
        "area",
        "campo",
        "disciplina",
        "subdisciplina",       
        "apoyo_CONACYT",
        "id_investigador",
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
