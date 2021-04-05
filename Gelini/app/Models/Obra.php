<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Obra extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'obras';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre', 'Descripcion', 'Estado', 'Fecha_Inicio', 'Fecha_Fin'];

    public function getFecha_InicioAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
    }
    
    public function getFecha_FinAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
    }

    
}
