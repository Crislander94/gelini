@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <div class="container">
       
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header"><b>Crear Nuevo banco</b></div>
                    <div class="card-body">
                        <a href="{{ url('/bancos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/bancos') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('bancos.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
