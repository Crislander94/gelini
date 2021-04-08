<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banco extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bancos';

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
    protected $fillable = ['codigo_banco', 'nombre_banco'];

    
}
