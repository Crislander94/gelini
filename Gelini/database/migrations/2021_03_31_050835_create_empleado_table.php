<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula');
            $table->string('genero');
            $table->string('email');
            $table->date('fechanacimiento');
            $table->date('fingreso');
            $table->date('fsalida');
            $table->integer('numeroCargas');
            $table->string('telefono');
            $table->timestamps();
            //Foranea a contrato
            $table->unsignedBigInteger('contrato')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('contrato')->references('id')->on('contrato');
            //Foranea a deparatamento
            $table->unsignedBigInteger('departamento')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('departamento')->references('id')->on('departamento');
            //Foranea a cargo
            $table->unsignedBigInteger('cargo')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('cargo')->references('id')->on('cargo');
            //Foranea a usuarios
            $table->unsignedBigInteger('rolUsuario')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('rolUsuario')->references('id')->on('users');
            
        });
        
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
