@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar Red Social</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">  

                @includeif('partials.errors')

                <div class="card card-default">
                   
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('redsocials.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $galeria->nombreRS }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $galeria->tipoRS}}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            {{ $galeria->link }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio:</strong>
                            {{ $galeria->Servicio->nombreS }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
