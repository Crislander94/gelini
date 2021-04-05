<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Model\departamento;
class empleado extends Model
{
    use HasFactory;
    protected $fillable =['cedula','nombre','apellido','fnacimiento','email','telefono','genero','cargas','fingreso','fsalida','cargo','sueldo','obra','departamento','contrato'];                  

    
    
    public function departamento()
    {
            return $this->belongsTo('App\Models\departamento');
    }

    
}

