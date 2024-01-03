<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicilioResidencia extends Model
{
    use HasFactory;

    protected $fillable=[
        "Pais",
        "Codigo_postal",
        "Estado",
        "Municipio_delegacion",
        "Localidad",
        "Asentamiento",
        "Tipo_asentamiento",
        "Nombre_asentamiento",
        "Carretera",
        "Nombre_vialidad",
        "Parte_numerica1",
        "Numero_exterior_anterior",
        "Parte_alfanumerica",
        "Parte_numerica2",
        "Tipo",
        "Nombre",
        "Descripcion_ubicacion",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
