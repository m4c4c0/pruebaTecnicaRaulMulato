<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    use HasFactory;
    protected $table = 'contribuyentes';
    protected $fillable = [
        'id', 
        'tipo_contribuyente',
        'estado'
    ];
}
