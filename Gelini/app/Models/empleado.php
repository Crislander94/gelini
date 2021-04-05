<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $fillable =[
    'cedula',
    'nombres',
    'apellidos',
    'fechanacimiento',
    'email',
    'telefono',
    'genero',
    'numeroCargas',
    'fingreso',
    'fsalida',
    'cargo',
    'departamento',
    'contrato'];                  
}
