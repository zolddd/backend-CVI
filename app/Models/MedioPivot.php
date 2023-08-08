<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedioPivot extends Model
{
    protected $table = 'medio_pivots';
    use HasFactory;
    protected $fillable = [
        "medio_id",
        "user_id"
    ];
}
