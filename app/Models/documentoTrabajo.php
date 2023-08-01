<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentoTrabajo extends Model
{
    use HasFactory;
     protected $fillable=[
            "Titulo_documento",
            "Nombre_autor",
            "Primer_Apellido_Autor",
            "Segundo_Apellido_Autor",
            "Paginas",
            "Palabras_claves",
            "Titulo_publicacion",
            "Año_Publicacion",
            "Area",
            "Campo",
            "Disciplina",
            "Subdisciplina"
    ];
}
