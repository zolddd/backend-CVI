<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicilioResidencia extends Model
{
    protected $table = 'domicilio_residencias';

    use HasFactory;

    protected $fillable=[
        "Pais",
        "Codigo_postal",
        "Nombre_asentamiento",
        "Estado",
        "Municipio_delegacion",
        "Localidad",
        "Asentamiento",
        "Tipo_asentamiento",
        "Carretera",
        "Nombre_vialidad",
        "Sin_numero",
        "Parte_numerica",
        "parte_numerica_interior",
        "Numero_exterior_anterior",
        "Parte_alfanumerica",
        "Parte_alfanumerica_interior",
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
