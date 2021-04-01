@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <div class="container">
       
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header ">Obras</div>
                    <img class="mx-auto d-block " src="img/descarga.jpg" alt="">
                    <div class="card-body ">
                        <a href="{{ url('/obras/create') }}" class="btn btn-success btn-sm" title="Add New Obra">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Obra
                        </a>

                        <form method="GET" action="{{ url('/obras') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table table-over table-bordered table-condensed">
                                <thead>
                                    <tr>
                                     <th>#</th><th>Nombre</th><th>Descripcion</th><th>Estado</th><th>Fecha_Inicio</th><th>Fecha_Fin</th><th>     </th>
                                     </tr>
                                </thead>
                                <tbody>
                                @foreach($obras as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                       <td>{{ $item->Nombre }}</td><td>{{ $item->Descripcion }}</td><td>{{ $item->Estado }}</td><td>{{ $item->Fecha_Inicio }}</td><td>{{ $item->Fecha_Fin }}</td>
                                        <td>
                                            <a href="{{ url('/obras/' . $item->id) }}" title="Ver Obra"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/obras/' . $item->id . '/edit') }}" title="Editar Obra"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/obras' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Obra" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                            <div class="pagination-wrapper"> {!! $obras->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
