@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar servicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">  

                @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="float-right">
                            <div class="inline-buttons">
                                <a class="btn btn-success" href="{{ route('servicios.prueba', ['servicioId' => $galeria->id]) }}"> Calificar</a>

                                <a class="btn btn-warning" href="{{ route('servicios.promedio', ['servicioId' => $galeria->id]) }}"> Promedio</a>
                                
                                <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $galeria->nombreS }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            <img class="rounded-circle" src="{{asset('/imagenes/'.$galeria->urlImage)}}" alt="{{$galeria->imagenes}}" width="100" height="100">     
                        </div>
                        <div class="form-group">
                            <strong>Cédula J:</strong>
                            {{ $galeria->cedulaS }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $galeria->descripcionS }}
                        </div>
                        <div class="form-group">
                            <strong>Día Apertura:</strong>
                            {{ $galeria->diaI }}
                        </div>
                        <div class="form-group">
                            <strong>Día Cierre:</strong>
                            {{ $galeria->diaF }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Apertura:</strong>
                            {{ $galeria->horaI }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Cierre:</strong>
                            {{ $galeria->horaF }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $galeria->Persona->nombreP }}
                        </div>
                        <div class="form-group">
                            <strong>Categoría:</strong>
                            {{ $galeria->Subcategoria->Categoria->nombreC }}
                        </div>
                        <div class="form-group">
                            <strong>Subcategoría:</strong>
                            {{ $galeria->Subcategoria->nombreSC }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
