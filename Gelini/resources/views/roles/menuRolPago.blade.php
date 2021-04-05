use Illuminate\Http\Request;
use app\Http\Controller\RolPagoController;

@extends('adminlte::page')
@section('title', 'MENU-Rol de Pago')
@section('content_header')
    <h1>Funciones</h1>
@stop

@section('content')
  <div class="card">
    <h5 class="card-header">HISTORIAL DE ASISTENCIAS</h5>
    <div class="card-body">
      <h5 class="card-title">Registrar Asistencias</h5>
      <p class="card-text">Registro de días trabajados y observaciones.<b>Paso indispensable para generar los roles de pago</b></p>
      <a href="historial/create" class="btn btn-lg btn-primary" tabindex="-1" role="button">Acceder</a>
    </div>
    <div class="card-body">
      <h5 class="card-title">Visualizar o Modificar Asistencias</h5>
      <p class="card-text"><p>Dentro de los plazos establecidos.</p>
      <a href="historial/show" class="btn btn-lg btn-primary" tabindex="-1" role="button">Acceder</a>
    </div>
  </div>
@stop


