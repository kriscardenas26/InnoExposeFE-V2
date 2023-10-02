<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombreRS', $galeria->nombreRS, ['class' => 'form-control' . ($errors->has('nombreRS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('nombreRS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo') }}
            {{ Form::select('tipoRS', [ 'Facebook' => 'Facebook','Instagram' => 'Instagram','Twitter' => 'Twitter','Jueves' => 'Jueves']
                , $galeria->tipoRS, ['class' => 'form-control' . ($errors->has('tipoRS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('tipoRS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Link') }}
            {{ Form::text('link', $galeria->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Servicio') }}
            {{ Form::select('servicio_id', $temas, $galeria->servicio_id, ['class' => 'form-control' . ($errors->has('servicio_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('servicio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>