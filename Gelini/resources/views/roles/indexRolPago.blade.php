@extends('adminlte::page')
@section('title', 'Rol de Pagos')

@section('content_header')
    <div> 
    
    <h1><b>Historial de Empleados</b> </h1>
    </div>
    
@stop

@section('content')
    <div class="card">
        
        <div class="card-body">
        <table class="table table-hover table-bordered table-condensed">
            <thead class="text-center">
                <tr>
                    <th>Empleado</th>
                    <th>Periodo</th>
                    <th>Dias Trabajados</th>
                    <th>Dias Ausencia</th>
                    <th>Observaciones</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($historiales as $historial)
                    <tr>
                        <td>{{$historial->empleado_id}}</td>
                        <td>{{$historial->fecha_registro}}</td>
                        <td>{{$historial->dias_trabajados}}</td>
                        <td>{{$historial->dias_ausencia}}</td>
                        <td>{{$historial->observacion}}</td>
                        <td width="10px" >
                            <a class="btn btn-warning btn-sm " href="{{route('admin.empleados.edit',$historial)}}" ><i class="fas fa-user-edit"> </i></a>
                        </td>    
                        <td width="10px" >
                            <form action=" {{route('admin.empleados.destroy', $historial)}}" method="POST" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-user-times" ></i> </button>
                            
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </div>
    </div>
@endsection