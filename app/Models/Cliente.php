<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'cod_tipo_documento',
        'dui_nit',
        'nrc',
        'nombre',
        'nombre_comercial',
        'telefono',
        'correo',
        'direccion',
        'ciudad',
        'region',
        'cod_actividad_economica',
        'cod_departamento',
        'cod_municipio',
        'tipo_persona',
        'descripcion_adicional',
        'tipo_cliente',
        'id_tipo_contribuyente'
    ];

    // Relación con departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'cod_departamento', 'cod_mh_departamento');
    }

    // Relación con municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'cod_municipio', 'cod_mh_municipio');
    }

    // Relación con pais
    public function pais()
    {
        return $this->belongsTo(Paises::class, 'id', 'nombre');
    }

    // Relación con contribuyentes
    public function contribuyente()
    {
        return $this->belongsTo(Contribuyente::class, 'id', 'tipo_contribuyente');
    }

    // Relación con documento
    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id', 'tipo_documento');
    }

    // Relación con giro (Actividad Economica)
    public function giro()
    {
        return $this->belongsTo(Actividad::class, 'id', 'actividad_economica');
    }
}
