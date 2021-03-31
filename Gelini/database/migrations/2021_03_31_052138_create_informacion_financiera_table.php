<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionFinancieraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacionFinanciera', function (Blueprint $table) {
            $table->id();
            $table->string('cuentaPropia');
            $table->string('nroCuenta');
            //Foranea a contrato
            $table->unsignedBigInteger('banco')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('banco')->references('id')->on('banco');
            //Foranea a tipoCuenta
            $table->unsignedBigInteger('tipoCuenta')
            ->contrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('tipoCuenta')->references('id')->on('tipoCuenta');
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
        Schema::dropIfExists('informacionFinanciera');
    }
}
