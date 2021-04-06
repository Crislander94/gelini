@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <div class="container">
       
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Departamentos</div>
                    <img class="mx-auto d-block " src="img/descarga.jpg" alt="">
                    <div class="card-body">
                        <a href="{{ url('/departamentos/create') }}" class="btn btn-success btn-sm" title="Add New departamento">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/departamentos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Empleado</th><th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($departamentos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->departamento }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $departamentos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
