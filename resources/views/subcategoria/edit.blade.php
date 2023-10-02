@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar subcategoría</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">  

                @includeif('partials.errors')

                <div class="card card-default">
                   
                    <div class="card-body">
                        <form method="POST" action="{{ route('subcategorias.update', $galeria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('subcategoria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
