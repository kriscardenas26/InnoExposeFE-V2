@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Rol</h3>
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

                            {!! Form::open(array('route' => 'roles.store', 'method' => 'POST')) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" style="font-size: 12px;">Nombre del Rol:</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="permissions">Permisos para este Rol:</label>
                                        <br>
                                        <div class="row py-3">
                                            @foreach ($permission as $value)
                                                <div class="col-md-4 col-lg-3">
                                                    <div class="form-check">
                                                        {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                                        <label class="form-check-label">{{ $value->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-md-4 col-lg-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="select-all" id="select-all" class="form-check-input">
                                                    <label class="form-check-label" for="">Seleccionar todos los permisos</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
