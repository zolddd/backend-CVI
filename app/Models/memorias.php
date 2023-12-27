<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memorias extends Model
{
    protected $table = 'memorias';
    use HasFactory;

    protected $fillable=[
        "titulo_memorias",
        "nombre",
        "primer_apellido",
        "segundo_apellido",
        "titulo_publicacion",     
        "de_pagina",    
        "a_pagina", 
        "year_publicacion", 
        "pais", 
        "palabra_clave1", 
        "palabra_clave2", 
        "palabra_clave3", 
        "area", 
        "campo", 
        "disciplina",
        "subdisciplina",
        "apoyo_CONACYT",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
