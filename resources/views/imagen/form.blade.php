<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('Nombre', null, ['class' => 'control-label']) }}
                    {{ Form::text('fileName', $galeria->fileName, ['class' => 'form-control' . ($errors->has('fileName') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('fileName', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-6">
                    {{ Form::label('Servicio', null, ['class' => 'control-label']) }}
                    {{ Form::select('servicio_id', $temas, $galeria->servicio_id, ['class' => 'form-control' . ($errors->has('servicio_id') ? ' is-invalid' : ''), 'placeholder' => 'Servicio']) }}
                    {!! $errors->first('servicio_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::text('idUsuario', Auth::user()->id, ['class' => 'form-control'  . ($errors->has('idUsuario') ? ' is-invalid' : ''), 'placeholder' => '', 'hidden']) }}
                    {!! $errors->first('idUsuario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        
        <div class="form-group">
            {{ Form::label('Subir imagen', null, ['class' => 'control-label']) }}
            <div class="row">
                <div class="col-md-6">
                    <input id="urlImage" type="file" class="form-control @error('urlImage') is-invalid @enderror" name="urlImage" value="{{ $galeria->urlImage }}" autocomplete="urlImage">
                    @error('urlImage')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        


        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</div>
