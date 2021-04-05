<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            //foranea a empleado
            $table->id();//pk

            $table->unsignedBigInteger('empleado_id')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('empleados');

            $table->date('fecha_registro');
            $table->integer('dias_trabajados');
            $table->integer('dias_ausencia');
            $table->string('observacion');
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
        Schema::dropIfExists('historial');
    }
}
