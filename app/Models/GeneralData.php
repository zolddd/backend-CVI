<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralData extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden llenar de forma masiva
     * 
     * @var array<int,string> 
     * */ 
    protected $fillable = [
        "CURP",
        "RFC",
        "nombre",
        "primer_apellido",
        "segundo_apellido",
        "fecha_de_nacimiento",
        "sexo",
        "pais",
        "entidad",
        "estado_conyugal",
        "nacionalidad",
        "cvi",
        "medio",
        "categoria",
        "telefono",
        "principal"
    ];

}
