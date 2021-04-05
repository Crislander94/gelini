@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <div> 
    
    <h1><b> Lista de Empleados</b>  <a class="btn btn-primary btn-sm" href="{{route('admin.empleados.create')}}"> <i class="fas fa-user-plus "> Empleado </i></a> </h1>
   

    </div>
    
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered table-condensed">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apelllido</th>
                    <th>Genero</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <!-- FORANEAS  -->
                    <th>Contrato</th>
                    <th>Cargo</th>
                    <!-- fin de foraneas-->
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($empleados as $empleado)
                    <tr>
                        <td class="table-primary">{{$empleado->id}}</td>
                        <td>{{$empleado->cedula}}</td>
                        <td>{{$empleado->nombres}}</td>
                        <td>{{$empleado->apellidos}}</td>
                        <td>{{$empleado->genero}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->contrato}}</td>
                        <td>{{$empleado->cargo}}</td>
                        <td>{{$empleado->fingreso}}</td>
                        <td>{{$empleado->fsalida}}</td>
                        <td width="10px" >
                            <a class="btn btn-warning btn-sm " href="{{route('admin.empleados.edit',$empleado)}}" ><i class="fas fa-user-edit"> </i></a>
                        </td>    
                        <td width="10px" >
                            <form action=" {{route('admin.empleados.destroy', $empleado)}}" method="POST" >
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


@stop