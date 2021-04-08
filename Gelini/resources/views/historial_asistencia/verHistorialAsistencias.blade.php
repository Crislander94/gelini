@extends('adminlte::page')

@section('title', 'Historiales de Asistencia')

@section('content_header')
    <h1>Historia de Asistencias de los Empleados</h1>
@stop


@section('content')

<div class="card">        
        <div class="card-body">
        <table class="table table-hover table-bordered table-condensed">
            <thead class="text-center">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
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
                        <td>{{ $historial-> nombres }}</td>
                        <td>{{$historial-> apellidos}}</td>
                        <td>{{$historial-> fecha_registro}}</td>
                        <td>{{$historial-> dias_trabajados}}</td>
                        <td>{{$historial-> dias_ausencia}}</td>
                        <td>{{$historial-> observacion}}</td>
                        <td width="10px" >
                            <a class="btn btn-warning btn-sm " href="" ><i class="fas fa-user-edit"> </i></a>
                        </td>    
                        <td width="10px" >
                            <form action="" method="POST" >
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
@stop


