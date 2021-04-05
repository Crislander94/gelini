<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\empleado;


class departamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departamentos';

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
    protected $fillable = ['descripcion'];

    public function empleados(){
        return $this->belongsTo('App\Models\departamento');
        
    }

}
