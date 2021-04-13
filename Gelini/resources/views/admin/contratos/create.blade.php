@extends('adminlte::page')
@section('title', 'Gelini S.A.')

@section('content_header')
    <h1>Create de contratos</h1>
@stop

@section('content')
<div class="card">
        <div class="card-body ">
            {!! Form::open(['route'=>'admin.contratos.store'])!!}

            <div class="form-group">
                        {!! Form::label('descripcion','DESCRIPCION')!!}
                        {!! Form::text ('descripcion' , null , ['class' => 'form-control','placeholder="Ingresar una descripcion"'])!!}


                        @error('descripcion')
                                <span class="text-danger">{{$message}}</span>
                        @enderror

            </div>
            {!!Form::submit('Guardar',['class=" btn btn-success " ']) !!}
                    {!!Form::reset('Cancelar',['class=" btn btn-danger " ']) !!}


            {!! form::close() !!}
        </div>
    </div>
@stop

