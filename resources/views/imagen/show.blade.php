@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar imagen</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">  

                @includeif('partials.errors')

                <div class="card card-default">
                   
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imagens.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $galeria->fileName }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio:</strong>
                            {{ $galeria->Servicio->nombreS }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img class="rounded-circle" src="{{asset('/imagenes/'.$galeria->urlImage)}}" alt="{{$galeria->imagenes}}" width="100" height="100">
                                          
                        </div>
                    

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
