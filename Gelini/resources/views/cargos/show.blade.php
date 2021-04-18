@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <div class="container">
       
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">cargo {{ $cargo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/cargos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cargos/' . $cargo->id . '/edit') }}" title="Edit cargo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('cargos' . '/' . $cargo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete cargo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cargo->id }}</td>
                                    </tr>
                                    <tr><th> Descripcion </th><td> {{ $cargo->descripcion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
