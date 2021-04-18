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
            $table->char('estado',1); //A-activo o P-pasivo
            $table->string('genero');
            $table->string('email');
            $table->date('fechanacimiento');
            $table->date('fingreso');
            $table->date('fsalida');
            $table->integer('cargas');
            $table->string('telefono');
            $table->char('decimo3_estado',1); //Pueden tener 2 estados
            $table->char('decimo4_estado',1); //M->mensualizado o A->AnualAAA jajajaja
            $table->char('fondoreserva_estado',1);
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
            $table->foreign('departamento')->references('id')->on('departamentos');
            //Foranea a cargo
            $table->unsignedBigInteger('cargo')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('cargo')->references('id')->on('cargos');
            //Foranea a usuarios
            $table->unsignedBigInteger('rolUsuario')
            ->nullable()
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('rolUsuario')->references('id')->on('users');
            //Foranea de Obras
            $table->unsignedBigInteger('obra')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('obra')->references('id')->on('obras');
            //Foranea de bancos
            $table->unsignedBigInteger('banco')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('banco')->references('id')->on('bancos');
            
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
