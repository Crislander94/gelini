<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Model\departamento;
class empleado extends Model
{
    use HasFactory;
    protected $fillable =[
    'cedula',
    'nombres',
    'apellidos',
    'fechanacimiento',
    'estado',
    'email',
    'telefono',
    'genero',
    'cargas',
    'fingreso',
    'fsalida',
    'cargo',
    'departamento',
    'contrato',
    'decimo3_estado',
    'decimo4_estado',
    'fondoreserva_estado'
    ];                  
}

