<div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
    <label for="Nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="Nombre" type="text" id="Nombre" value="{{ isset($obra->Nombre) ? $obra->Nombre : ''}}" >
    {!! $errors->first('Nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Descripcion') ? 'has-error' : ''}}">
    <label for="Descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="Descripcion" type="text" id="Descripcion" value="{{ isset($obra->Descripcion) ? $obra->Descripcion : ''}}" >
    {!! $errors->first('Descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Estado') ? 'has-error' : ''}}">
    <label for="Estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="Estado" type="text" id="Estado" value="{{ isset($obra->Estado) ? $obra->Estado : ''}}" >
    {!! $errors->first('Estado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Fecha_Inicio') ? 'has-error' : ''}}">
    <label for="Fecha_Inicio" class="control-label">{{ 'Fecha Inicio' }}</label>
    <input class="form-control" name="Fecha_Inicio" type="date" id="Fecha_Inicio" value="{{ isset($obra->Fecha_inicio) ? $obra->Fecha_inicio : ''}}" >
    {!! $errors->first('Fecha_Inicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Fecha_Fin') ? 'has-error' : ''}}">
    <label for="Fecha_Fin" class="control-label">{{ 'Fecha Fin' }}</label>
    <input class="form-control" name="Fecha_Fin" type="date" id="Fecha_Fin" value="{{ isset($obra->Fecha_fin) ? $obra->Fecha_fin : ''}}" >
    {!! $errors->first('Fecha_Fin', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Crear' : 'Create' }}">
</div>
