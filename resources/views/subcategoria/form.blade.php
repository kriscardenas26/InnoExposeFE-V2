<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::select('categoria_id', $temas, $galeria->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombreSC', $galeria->nombreSC, ['class' => 'form-control' . ($errors->has('nombreSC') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('nombreSC', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>