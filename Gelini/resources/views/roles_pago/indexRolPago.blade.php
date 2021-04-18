@extends('adminlte::page')
@section('title', 'Rol de Pagos')

@section('content_header')
    <h1><b>Roles de Pagos</b> </h1>
@stop

@section('content')

<div class="card">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  {{-- <a class="btn btn-primary " href="{{route('roles.create')}}"> <i class="fas fa-user-plus "> NUEVO </i></a> --}}
    <form class="d-flex">
      <input name="buscar" class="form-control me-2" type="search" placeholder="Buscar " aria-label="Search" value="{{$buscar}}">
      <button class="btn btn-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>

   <div class="card-body">

   @if(session('informacion'))
    <div class="alert alert-success alert-dismissible fade show role="alert"">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><b> {{session('informacion')}}</b></strong>
    </div>

@endif
        
        <table class="table table-responsive  table-hover table-bordered table-condensed">
            <thead class="text-center" >
                <tr>
                    
                    <th class="table-primary">Cedula</th>
                    <th>Nombres</th>
                    <th>Apelllidos</th>
                    <th>Días Trabajados</th>
                    <th>Sueldo</th>
                    <th>Fondos de Reserva</th>
                    <th>Ingresos Totales</th>
                    <th>Seguridad Social</th>
                    <th>Egresos Totales</th>
                    <th>Total a Pagar</th>
                    <th colspan="2" >Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($rolespago as $rolpago)
                    <tr>                     
                        <td class="table-primary">{{$rolpago-> cedula}}</td>
                        <td>{{$rolpago-> nombres}}</td>
                        <td>{{$rolpago-> apellidos}}</td>
                        <td>{{$rolpago-> dias_trabajados}}</td>
                        <td>{{$rolpago-> sueldo}}</td>
                        <td>{{$rolpago-> fondo_reserva}}</td>
                        <td>{{$rolpago-> total_ingresos}}</td>
                        <td>{{$rolpago-> seguridad_social}}</td>
                        <td>{{$rolpago-> total_egresos}}</td>
                        <td>{{$rolpago-> total_pagar}}</td>
                        <td  >
                            <a class="btn btn-warning btn-sm " href="{{route('roles.edit',$rolpago->id)}}" ><i class="fas fa-user-edit"> </i></a>
                        </td>    
                        <td >
                            <form action=" {{route('roles.destroy', $rolpago->id)}}" method="POST" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-user-times" ></i> </button>
                            
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        
        </table>
     
        </div>
</div>

@endsection