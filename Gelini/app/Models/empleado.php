<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $fillable =['cedula','nombre','apellido','fnacimiento','email','telefono','genero','cargas','fingreso','fsalida','cargo','sueldo','obra','departamento','contrato'];                  

}
