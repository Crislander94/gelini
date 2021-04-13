@extends('adminlte::page')
@section('title', 'Gelini S.A.')

@section('content_header')
    <h1><b> Lista de Cargos</b> <a class="btn btn-primary btn-sm " href="{{route('admin.contratos.create')}}"> <i class="fas fa-user-plus "> NUEVO </i></a> </h1> 
 </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        
        @if(session('informacion'))
    <div class="alert alert-success alert-dismissible fade show role="alert"">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><b> {{session('informacion')}}</b></strong>
    </div>

@endif
       
            <table class="table table-striped text-center   table-hover table-bordered table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DESCRIPCION</th>
                    <th colspan="2" >ACCIONES</th>
                    
                </tr>
            </thead>
                <tbody>
                @foreach ($contratos as $contrato)
                    <tr>
                        <td>{{$contrato->id}}</td>
                        <td>{{$contrato->descripcion}}</td>
                        <td  width="10px" >
                            <a class="btn btn-warning btn-sm " href="{{route('admin.contratos.edit',$contrato->id)}}" ><i class="fas fa-user-edit"> </i></a>
                        </td>
                        <td width="10px" >
                            <form action=" {{route('admin.contratos.destroy', $contrato->id)}}" method="POST" >
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
