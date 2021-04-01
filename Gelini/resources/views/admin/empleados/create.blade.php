@extends('adminlte::page')
@section('title', 'Gelini')

@section('content_header')
    <h1>Agregar Empleado</h1>
@stop

@section('content')



    <div class="card">
        <div class="card-body ">
            {!! Form::open(['route'=>'admin.empleados.store'])!!}



                    <div class="form-group">
                        {!! Form::label('cedula','Cedula')!!}
                        {!! Form::text ('cedula' , null , ['class' => 'form-control','placeholder="Ingresar Cedula"'])!!}

                        @error('cedula')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {!! Form::label('nombre','Nombre')!!}
                        {!! Form::text ('nombre' , null , ['class' => 'form-control','placeholder="Ingresar Nombre"'])!!}

                        @error('nombre')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>


                    <div class="form-group">
                        {!! Form::label('apellido','Apellido')!!}
                        {!! Form::text ('apellido' , null , ['class' => 'form-control','placeholder="Ingresar Apellidio"'])!!}
                        @error('apellido')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {!! Form::label('fnacimiento','Fecha Nacimiento')!!}
                        {!! Form::date('fnacimiento', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}

                        @error('fnacimiento')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">

                        {!! Form::label('email','Email')!!}
                        {!! Form::email ('email' , null , ['class' => 'form-control' ,'required' => 'required', 'placeholder="Ingresar Email"'])!!}

                        @error('email')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('telefono','Telefono')!!}
                        {!! Form::text ('telefono' , null , ['class' => 'form-control','placeholder="Ingresar Telefono"'])!!}

                        @error('telefono')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    <div class="form-group form-select">
                        {!! Form::label('genero','Genero')!!}
                        {!! Form::select('genero',$genero,null,['class'=>'form-control'])!!}

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
                        {!! Form::date('fsalida', \Carbon\Carbon::now() , ['class' => 'form-control'])  !!}

                        @error('fsalida')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror



                    </div>

                    <!-- Campos Foraneos-->



                    <div class="form-group">
                        {!! Form::label('cargo','Cargo')!!}
                        {!! Form::select('cargo',$cargos,null,['class'=>'form-control'])!!}

                        @error('cargo')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {!! Form::label('sueldo','Sueldo')!!}
                        {!! Form::text ('sueldo' , null , ['class' => 'form-control','readonly'])!!}



                    </div>

                    <div class="form-group">
                        {!! Form::label('obra','Obra')!!}
                        {!! Form::select('obra',$obra,null, ['multiple'=>'multiple','name'=>'obra[]','class' => 'form-control','readonly'])!!}

                        @error('obra')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>


                    <div class="form-group">
                        {!! Form::label('departamento','Departameto')!!}
                        {!! Form::select('departamento',$departamento,null ,['class'=>'form-control'])!!}

                        @error('departamento')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror


                    </div>

                    <div class="form-group">
                        {!! Form::label('contrato','Contrtato')!!}
                        {!! Form::select('contrato',$contrato,null,['class'=>'form-control'])!!}

                        @error('contrato')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror

                    </div>



                    {!!Form::submit('Guardar',['class=" btn btn-success btn-lg" ']) !!}

            {!! form::close() !!}
        </div>
    </div>


@stop

