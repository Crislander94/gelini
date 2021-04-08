<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('perfil', function () {
    return view('profile.show');
})->name('perfil');


Route::get('inicio', function () {
    return view('welcome');
})->name('inicio');

Route::resource('obras', 'App\Http\Controllers\ObrasController');
Route::resource('empleados', 'App\Http\Controllers\admin\EmpleadoController');

Route::resource('departamentos', 'App\Http\Controllers\departamentosController');
Route::resource('historial','App\Http\Controllers\HistorialAsistenciasController');
Route::resource('roles','App\Http\Controllers\RolPagoGenController');
Route::resource('bancos','App\Http\Controllers\bancosController');

