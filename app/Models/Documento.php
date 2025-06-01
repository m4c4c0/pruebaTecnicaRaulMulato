<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documento';
    protected $fillable = [
        'id', 
        'tipo_documento',
        'cod_tipo_documento',
        'estado'
    ];
}
