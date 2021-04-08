<div class="form-group {{ $errors->has('codigo_banco') ? 'has-error' : ''}}">
    <label for="codigo_banco" class="control-label">{{ 'Codigo Banco' }}</label>
    <input class="form-control" name="codigo_banco" type="number" id="codigo_banco" value="{{ isset($banco->codigo_banco) ? $banco->codigo_banco : ''}}" >
    {!! $errors->first('codigo_banco', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre_banco') ? 'has-error' : ''}}">
    <label for="nombre_banco" class="control-label">{{ 'Nombre Banco' }}</label>
    <input class="form-control" name="nombre_banco" type="text" id="nombre_banco" value="{{ isset($banco->nombre_banco) ? $banco->nombre_banco : ''}}" >
    {!! $errors->first('nombre_banco', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
