<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
    
    protected $fillable = [
        'id',
        'departamento',
        'cod_mh_departamento',
        'estado'
    ];

    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'cod_mh_departamento', 'cod_mh_departamento');
    }
}