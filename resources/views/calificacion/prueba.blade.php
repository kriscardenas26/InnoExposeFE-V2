@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Calificar Servicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('calificaciones.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
                                <div class="form-group">
                                    <label for="nota" style="font-size: 12px;">Calificación (del 1 al 5):</label>
                                    <input type="number" name="nota" min="1" max="5" class="form-control">
                                </div>
                                <div class="inline-buttons">
                                    <button type="submit" class="btn btn-primary">Calificar</button>
                                    
                                    <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Volver</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
