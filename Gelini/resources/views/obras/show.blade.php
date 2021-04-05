@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <div class="container">
        
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Obra {{ $obra->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/obras') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/obras/' . $obra->id . '/edit') }}" title="Edit Obra"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('obras' . '/' . $obra->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Obra" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $obra->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $obra->Nombre }} </td></tr><tr><th> Descripcion </th><td> {{ $obra->Descripcion }} </td></tr><tr><th> Estado </th><td> {{ $obra->Estado }} </td></tr><tr><th> Fecha_Inicio </th><td> {{ $obra->Fecha_inicio }} </td></tr><tr><th> Fecha_Fin </th><td> {{ $obra->Fecha_fin }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
