<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionGeneral extends Model
{
    use HasFactory;
    protected $table = 'informacion_general';
    /**
     * Campos que se pueden llenar de forma masiva
     * 
     * @var array<int,string> 
     * */
    protected $fillable = [
        "curp",
        "rfc",
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

    protected $casts = [
        "fecha_de_nacimiento" => "date",
        "sexo" => "string",
        "estado_conyugal" => "string"
    ];

    public function user(){
        return $this->hasOne(Usuario::class, 'informacion_general_id','id');
    }
}
