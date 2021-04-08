@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <div> 
    
    <h1><b class="text-center"> Listado de Empleados</b> 

    </div>
    
@stop

@section('content')


<div class="card">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  <a class="btn btn-primary " href="{{route('admin.empleados.create')}}"> <i class="fas fa-user-plus "> NUEVO </i></a> </h1> 
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
                    <th>Nombre</th>
                    <th>Apelllido</th>
                    <th>Genero</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Obras</th>
                    <th>Contrato</th>
                    <th>Cargo</th>
                    <th>Departamento</th>
                    <th>Ingreso</th>
                    <th> Salida</th>
                    <th colspan="2" >Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($empleados as $empleado)
                    <tr>                     
                        <td class="table-primary">{{$empleado-> cedula}}</td>
                        <td>{{$empleado-> nombres}}</td>
                        <td>{{$empleado-> apellidos}}</td>
                        <td>{{$empleado-> genero}}</td>
                        <td>{{$empleado-> telefono}}</td>
                        <td>{{$empleado-> email}}</td>
                        <td >{{$empleado-> numeroCargas}}</td>
                        <td>{{$empleado-> contrato}}</td>
                        <td>{{$empleado-> cargo}}</td>
                        <td>{{$empleado-> departamentos}}</td>
                        <td>{{$empleado-> fingreso}}</td>
                        <td>{{$empleado-> fsalida}}</td>
                        <td  width="10px" >
                            <a class="btn btn-warning btn-sm " href="{{route('admin.empleados.edit',$empleado->id)}}" ><i class="fas fa-user-edit"> </i></a>
                        </td>    
                        <td width="10px" >
                            <form action=" {{route('admin.empleados.destroy', $empleado->id)}}" method="POST" >
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

{{$empleados->links()}}


@stop