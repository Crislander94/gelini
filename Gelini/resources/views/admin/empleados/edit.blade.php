@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')

<div class="card">
        <div class="card-body ">
            {!! Form::model($empleado,['route'=>['admin.empleados.update',$empleado],'method' => 'put'])!!}

                    <div class="form-group">
                        {!! Form::label('cedula','Cedula')!!}
                        {!! Form::text ('cedula' ,null, ['class' => 'form-control','placeholder="Ingresar Cedula"'])!!}

                        @error('cedula')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('nombres','Nombre')!!}
                        {!! Form::text ('nombres' ,null , ['class' => 'form-control','placeholder="Ingresar Nombre"'])!!}

                        @error('nombres')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('apellidos','Apellido')!!}
                        {!! Form::text ('apellidos' ,null , ['class' => 'form-control','placeholder="Ingresar Apellidio"'])!!}
                        @error('apellidos')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {!! Form::label('fechanacimiento','Fecha Nacimiento')!!}
                        {!! Form::date('fechanacimiento', null, ['class' => 'form-control'])  !!}

                        @error('fechanacimiento')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">

                        {!! Form::label('email','Email')!!}
                        {!! Form::email ('email' , null, ['class' => 'form-control' ,'required' => 'required', 'placeholder="Ingresar Email"'])!!}

                        @error('email')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('telefono','Telefono')!!}
                        {!! Form::text ('telefono' ,null, ['class' => ' form-control','placeholder="Ingresar Telefono"'])!!}

                        @error('telefono')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>
                    
                    <div class="form-group form-select">
                        {!! Form::label('genero','Genero')!!}
                        {!! Form::select('genero',$genero,null,['class'=>'form-control','placeholder' => 'Seleccione un Genero...'])!!}

                        @error('genero')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>
                    
                    
                    <div class="form-group">
                        {!! Form::label('cargas','Cargas')!!}
                        {!! Form::select('cargas',$carga,null,['class'=>'form-control'])!!}

                        @error('cargas')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('fingreso','Fecha Ingreso')!!}
                        {!! Form::date('fingreso', \Carbon\Carbon::now() , ['class' => 'form-control'])  !!}

                        @error('fingreso')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('fsalida','Fecha Salida')!!}
                        {!! Form::date('fsalida', null , ['class' => 'form-control'])  !!}

                        @error('fsalida')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('cargo','Cargo')!!}
                        {!! Form::select('cargo',$cargos,null,['class'=>'form-control','placeholder' => 'Seleccione un Cargo...'])!!}

                        @error('cargo')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {!! Form::label('obra','Obra')!!}
                        {!! Form::select('obra',$obra,null, ['class' => 'form-control','placeholder' => 'Seleccione una Obra...'])!!}
                       
                        @error('obra')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>


                    <div class="form-group">
                        {!! Form::label('departamento','Departameto')!!}
                        {!! Form::select('departamento',$departamento,null ,['class'=>'form-control','placeholder' => 'Seleccione un Departamento...'])!!}

                        @error('departamento')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror


                    </div>

                    <div class="form-group">
                        {!! Form::label('contrato','Contrtato')!!}
                        {!! Form::select('contrato',$contrato,null,['class'=>'form-control','placeholder' => 'Seleccione un tipo de contrato...'])!!}

                        @error('contrato')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    {!!Form::submit('Actualizar',['class=" btn btn-success btn-lg" ']) !!}

                    </div>
                </div>
                    

@stop