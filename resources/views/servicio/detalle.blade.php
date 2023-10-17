@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nota promedio del Servicio </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $servicio->nombre }}</h5>
                            <p class="card-text">{{ $servicio->descripcion }}</p>
                            <p class="card-text">Promedio de Calificaciones: {{ number_format($promedio, 2) }}</p>
                            <a href="{{ route('servicios.index') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection