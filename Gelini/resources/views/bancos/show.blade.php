@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <div class="container">
       
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header"><b>banco</b> {{ $banco->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/bancos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/bancos/' . $banco->id . '/edit') }}" title="Edit banco"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('bancos' . '/' . $banco->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete banco" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $banco->id }}</td>
                                    </tr>
                                    <tr><th> Codigo Banco </th><td> {{ $banco->codigo_banco }} </td></tr><tr><th> Nombre Banco </th><td> {{ $banco->nombre_banco }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
