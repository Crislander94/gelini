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
Route::resource('roles','App\Http\Controllers\RolPagoController');