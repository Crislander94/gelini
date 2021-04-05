use Illuminate\Http\Request;

@extends('adminlte::page')
@section('title', 'Rol de Pago')

@section('content_header')
    <h1>Historia de los Empleados</h1>
@stop


@section('content')
  {!! Form::open(['route'=>'historial.store'])!!}
        <h3>Historial de Asistencias de <b> {{date('M-Y') }}</b></h3> 
        <div class="row">
          <div class="col-md-6 employeeform">
            <span id="message"></span>
            <form method="post" id="insert">
            <div class="form-group">
                        {!! Form::label('empleado','Seleccione Empleado')!!}
                        {!! Form::select('empleado',$empleados,null ,['class'=>'form-control'])!!}

                        @error('empleado')
                            <span class="text-danger"><b> {{$message}}</b></span>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Días Trabajados</label>
                <input type="number" min="0" max="30" name="dias_trabajados" class="form-control" placeholder="Días Trabajados" required>
              </div>
              <div class="form-group col-md-6">
                <label>Días ausente en el trabajo</label>
                <input type="number" min="0" max="30" name="dias_ausencia" class="form-control" placeholder="Días ausente en el trabajo">
              </div>
              <div class="form-group col-md-6">
                <label>Observación</label>
                <input type="text" name="observacion" class="form-control" placeholder="Observación" >
              </div>
              <div class="form-group col-md-6"><p></p></div>
              <div class="form-group col-md-6">
                <button type="submit" class="btn btn-block btn-info">Guardar Historial</button>
              </div>
  {!! form::close() !!}
  
@stop


