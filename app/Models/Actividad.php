<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividadeconomica';
    protected $fillable = [
        'id', 
        'actividad_economica',
        'cod_actividad_economica',
        'estado'
    ];
}
