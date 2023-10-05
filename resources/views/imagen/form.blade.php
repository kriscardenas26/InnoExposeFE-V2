<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('fileName', $galeria->fileName, ['class' => 'form-control' . ($errors->has('fileName') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('fileName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
<a>Agregar imagen</a>
        <img class="col-md-4 col-form-label text-md-right" src="../../../public/imagenes/{{$galeria->urlImage}}" alt="" width="150">

        <div class="col-md-6">
            <input id="urlImage" type="file" class="form-control @error('urlImage') is-invalid @enderror" name="urlImage" value="{{ $galeria->urlImage }}" autocomplete="urlImage">

            @error('urlImage')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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