<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombreS', $galeria->nombreS, ['class' => 'form-control' . ($errors->has('nombreS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('nombreS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cédula J') }}
            {{ Form::text('cedulaS', $galeria->cedulaS, ['class' => 'form-control' . ($errors->has('cedulaS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('cedulaS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('descripcionS', $galeria->descripcionS, ['class' => 'form-control' . ($errors->has('descripcionS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('descripcionS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Día Apertura') }}
            {{ Form::select('diaI', [ 'Lunes' => 'Lunes','Martes' => 'Martes','Miércoles' => 'Miércoles','Jueves' => 'Jueves','Viernes' => 'Viernes'
                ,'Sábado' => 'Sábado','Domingo' => 'Domingo'], $galeria->diaI, ['class' => 'form-control' . ($errors->has('diaI') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('diaI', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Día Cierre') }}
            {{ Form::select('diaF', [ 'Lunes' => 'Lunes','Martes' => 'Martes','Miércoles' => 'Miércoles','Jueves' => 'Jueves','Viernes' => 'Viernes'
                ,'Sábado' => 'Sábado','Domingo' => 'Domingo'], $galeria->diaF, ['class' => 'form-control' . ($errors->has('diaF') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('diaF', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Hora Apertura') }}
            {{ Form::time('horaI', $galeria->horaI, ['class' => 'form-control' . ($errors->has('horaI') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('horaI', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Hora Cierre') }}
            {{ Form::time('horaF', $galeria->horaF, ['class' => 'form-control' . ($errors->has('horaF') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('horaF', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Encargado') }}
            {{ Form::select('persona_id', $temas, $galeria->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoría') }}
            {{ Form::select('categoria_id', $temas1, $galeria->subcategoria_id, ['class' => 'form-control' . ($errors->has('subcategoria_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subcategoría') }}
            {{ Form::select('subcategoria_id', $temas2, $galeria->subcategoria_id, ['class' => 'form-control' . ($errors->has('subcategoria_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('subcategoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>