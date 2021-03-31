@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <div> 
    
    <h1><b> Lista de Empleados</b>  

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
                    <th>Departamento</th>
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
                        <td>{{$empleado->id}}</td>
                        <td>{{$empleado->cedula}}</td>
                        <td>{{$empleado->nombres}}</td>
                        <td>{{$empleado->apellidos}}</td>
                        <td>{{$empleado->genero}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->contrato}}</td>
                        <td>{{$empleado->departamento}}</td>
                        <td>{{$empleado->cargo}}</td>
                        <td>{{$empleado->fingreso}}</td>
                        <td>{{$empleado->fsalida}}</td>
                        <td width="10px">
                            <a class="btn btn-warning" href="{{route('admin.empleados.edit',$empleado)}}" ><i class="fas fa-user-edit"> </i></a>
                        </td>    
                        <td width="10px">
                            <form action=" {{route('admin.empleados.destroy', $empleado)}}" method="POST" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-user-times" ></i> </button>
                            
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        
        
        </table>
    </div>
    
</div>


@stop