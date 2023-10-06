<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombreP', $persona->nombreP, ['class' => 'form-control' . ($errors->has('nombreP') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('nombreP', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('1° Apellidoㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ2° Apellido') }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::text('apellido1', $persona->apellido1, ['class' => 'form-control' . ($errors->has('apellido1') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('apellido1', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-6">
                    {{ Form::text('apellido2', $persona->apellido2, ['class' => 'form-control' . ($errors->has('apellido2') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('apellido2', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Tipo IDㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤIdentificación') }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::select('tipoIdentificacion', [ 'Nacional' => 'Nacional','Pasaporte' => 'Pasaporte','Nacionalizado' => 'Nacionalizado'], $persona->tipoIdentificacion, ['class' => 'form-control' . ($errors->has('tipoIdentificacion') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('tipoIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-6">
                    {{ Form::text('cedulaP', $persona->cedulaP, ['class' => 'form-control' . ($errors->has('cedulaP') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('cedulaP', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>