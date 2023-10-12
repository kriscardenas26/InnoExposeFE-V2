<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombreㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ Categoría') }}
            <div class="row">
                <div class="col-md-6">
                {{ Form::text('nombreSC', $galeria->nombreSC, ['class' => 'form-control' . ($errors->has('nombreSC') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                {!! $errors->first('nombreSC', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-6">
                {{ Form::select('categoria_id', $temas, $galeria->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>