<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medioContacto extends Model
{
    protected $table = 'medio_contacto';
    use HasFactory;
    protected $fillable=[
        "medio_contacto",
        "categoria_contacto",
        "valor",
        "principal",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
