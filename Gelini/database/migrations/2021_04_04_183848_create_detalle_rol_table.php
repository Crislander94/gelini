<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_rol', function (Blueprint $table) {
            $table->id();            
            //FK a empleado relación 1 empleado muchos rolespago
            $table->unsignedBigInteger('rolpago_id')
            ->contrained()
            ->unique()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('rolpago_id')->references('id')->on('rolpago');

            $table->double('sueldo',15,2);
            $table->double('fondo_reserva',15,2);
            $table->double('total_ingresos',15,2);
            $table->double('total_egresos',15,2);
            $table->double('seguridad_social',15,2);
            $table->double('total_pagar',15,2);
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
        Schema::dropIfExists('detalle_rol');
    }
}
