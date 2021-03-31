<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_obra', function (Blueprint $table) {
            //Foranea a Empleado
            $table->unsignedBigInteger('idEmpleado')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('idEmpleado')->references('id')->on('empleado');
            //Foranea a obra
            $table->unsignedBigInteger('idObra')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('idObra')->references('id')->on('obras');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_obra');
    }
}
