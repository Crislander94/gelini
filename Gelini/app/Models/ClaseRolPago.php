<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaseRolPago extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','empleado_nombres','empleado_apellidos','empleado_cargo','dias_trabajados','sueldo','ingresos','descuentos','iess','total_pagar'];
}