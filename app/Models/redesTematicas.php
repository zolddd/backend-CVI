<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redesTematicas extends Model
{
    protected $table = 'redes_tematicas';
    use HasFactory;

    protected $fillable=[
        "red_tematica",
        "fecha_ingreso",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }


}
