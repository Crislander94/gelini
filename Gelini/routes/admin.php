<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\ContratoController;

Route::get('', [HomeController::class, 'index']);
/*llamamos a todas las funciones del controlador Empleado*/
Route::resource('empleados',EmpleadoController::class)->names('admin.empleados');
Route::resource('contrato',ContratoController::class)->names('admin.contratos');