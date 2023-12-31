<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Nombreㅤㅤㅤㅤㅤㅤㅤㅤ‎ ‎ ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤSubir imagen') }}
                    <div class="row">
                        <div class="col-md-6">
                        {{ Form::text('nombreS', $galeria->nombreS, ['class' => 'form-control' . ($errors->has('nombreS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                        {!! $errors->first('nombreS', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6">
                        
                            <div class="row">
                                    <input id="urlImage" type="file" class="form-control @error('urlImage') is-invalid @enderror" name="urlImage" value="{{ $galeria->urlImage }}" autocomplete="urlImage">
                                    @error('urlImage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('CédulaㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤEncargado') }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::text('cedulaS', $galeria->cedulaS, ['class' => 'form-control' . ($errors->has('cedulaS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                            {!! $errors->first('cedulaS', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('persona_id', $temas, $galeria->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                            {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Día AperturaㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤDía Cierre') }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::select('diaI', [ 'Lunes' => 'Lunes','Martes' => 'Martes','Miércoles' => 'Miércoles','Jueves' => 'Jueves','Viernes' => 'Viernes'
                                ,'Sábado' => 'Sábado','Domingo' => 'Domingo'], $galeria->diaI, ['class' => 'form-control' . ($errors->has('diaI') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                            {!! $errors->first('diaI', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('diaF', [ 'Lunes' => 'Lunes','Martes' => 'Martes','Miércoles' => 'Miércoles','Jueves' => 'Jueves','Viernes' => 'Viernes'
                                ,'Sábado' => 'Sábado','Domingo' => 'Domingo'], $galeria->diaF, ['class' => 'form-control' . ($errors->has('diaF') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                            {!! $errors->first('diaF', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Hora Aperturaㅤㅤㅤㅤㅤㅤㅤㅤ‎ ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤHora Cierre') }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::time('horaI', $galeria->horaI, ['class' => 'form-control' . ($errors->has('horaI') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                            {!! $errors->first('horaI', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6">
                            {{ Form::time('horaF', $galeria->horaF, ['class' => 'form-control' . ($errors->has('horaF') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                            {!! $errors->first('horaF', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Categoríaㅤㅤㅤㅤㅤㅤ‎ ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ Subcategoría') }}
                    <div class="row">
                        <div class="col-md-6">
                        {{ Form::select('categoria_id', $categorias, $galeria->categoria_id, ['class' => 'form-control', 'id' => 'categoriaSelect', 'placeholder' => 'Seleccione']) }}
                        </div>
                        <div class="col-md-6">
                            <select name="subcategoria_id" id="subcategoriaSelect" class="form-control">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach ($subcategorias as $subcategoria)
                                    <option value="{{ $subcategoria->id }}" data-categoria="{{ $subcategoria->categoria_id }}">
                                        {{ $subcategoria->nombreSC }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Descripción') }}
                    {{ Form::textarea('descripcionS', $galeria->descripcionS, ['class' => 'form-control' . ($errors->has('descripcionS') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('descripcionS', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::text('idUsuario', Auth::user()->id, ['class' => 'form-control'  . ($errors->has('idUsuario') ? ' is-invalid' : ''), 'placeholder' => '', 'hidden']) }}
                    {!! $errors->first('idUsuario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

<script>
    document.getElementById('categoriaSelect').addEventListener('change', function() {
        var selectedCategoria = this.value;
        var subcategoriaSelect = document.getElementById('subcategoriaSelect');

        // Recorre las opciones de subcategoría y muestra u oculta según la categoría seleccionada
        Array.from(subcategoriaSelect.options).forEach(function(option) {
            if (selectedCategoria === option.getAttribute('data-categoria')) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });
</script>