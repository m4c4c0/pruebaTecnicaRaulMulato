<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';
    
    protected $fillable = [
        'id',
        'municipio',
        'cod_mh_municipio',
        'cod_mh_departamento'
    ];

    // Relación con departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'cod_mh_departamento', 'cod_mh_departamento');
    }
}
