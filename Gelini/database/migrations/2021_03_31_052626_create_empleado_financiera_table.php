<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoFinancieraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_financiera', function (Blueprint $table) {
            //Foranea a Empleado
            $table->unsignedBigInteger('idEmpleado')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('idEmpleado')->references('id')->on('empleado');
            //Foranea a Informacion Financiera
            $table->unsignedBigInteger('informacionFinanciera')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('informacionFinanciera')->references('id')->on('informacionFinanciera');
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
        Schema::dropIfExists('empleado_financiera');
    }
}
