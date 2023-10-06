<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombreC', $categoria->nombreC, ['class' => 'form-control' . ($errors->has('nombreC') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('nombreC', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>