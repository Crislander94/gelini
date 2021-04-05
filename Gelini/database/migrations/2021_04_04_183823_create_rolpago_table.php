<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolpagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolpago', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_registro');
            $table->Integer('mes');
            $table->char('estado',1); /*A-activo  C-cerrado */
            //FK a empleado relación 1 empleado muchos rolespago
            $table->unsignedBigInteger('empleado')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('empleado')->references('id')->on('empleados');
            $table->timestamps();
            /*//FK a empleado relación 1 empleado muchos rolespago
            $table->unsignedBigInteger('historial')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('historial')->references('id')->on('historial');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolpago');
    }
}
