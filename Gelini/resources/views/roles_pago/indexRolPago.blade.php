@extends('adminlte::page')
@section('title', 'Rol de Pagos')

@section('content_header')
    <h1><b>Roles de Pagos</b> </h1>
@stop

@section('content')
    <table class="table table-responsive  table-hover table-bordered table-condensed">
                <thead class="text-center" >
                    <tr>
                        <th class="table-primary">#</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apelllido</th>
                        <th>Cargo</th>
                        <th>Días Trabajados</th>
                        <th></th>
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
                            <td class="table-primary"><b> {{$empleado-> id}}</b></td>
                            <td>{{$empleado-> cedula}}</td>
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
@endsection