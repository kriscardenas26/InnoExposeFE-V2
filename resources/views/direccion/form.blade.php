<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Encargadoㅤㅤㅤㅤㅤㅤㅤ‎ ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤServicio') }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::select('persona_id', $temas, $galeria->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-6">
                    {{ Form::select('servicio_id', $temas1, $galeria->servicio_id, ['class' => 'form-control' . ($errors->has('servicio_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('servicio_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Dirección') }}
            {{ Form::textarea('nombreD', $galeria->nombreD, ['class' => 'form-control' . ($errors->has('nombreD') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('nombreD', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
                    {{ Form::text('idUsuario', Auth::user()->id, ['class' => 'form-control'  . ($errors->has('idUsuario') ? ' is-invalid' : ''), 'placeholder' => '', 'hidden']) }}
                    {!! $errors->first('idUsuario', '<div class="invalid-feedback">:message</div>') !!}
                </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>