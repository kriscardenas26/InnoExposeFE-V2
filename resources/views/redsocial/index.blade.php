<!-- Primera parte copiada -->
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Redes Sociales</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-redsocial')
                        <a class="btn btn-warning" href="{{ route('redsocials.create') }}">Crear nueva</a>
                        @endcan
                        <form class="form-inline my-2 my-lg-0 float-right" role="search">
                            <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar nombre" aria-label="Search">
                            &nbsp;
                            <button class="btn btn-warning" type="text">Buscar</button>
                        </form>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#14a3bb">

                                <th style="color:#fff;">No</th>
                                <th style="color:#fff;"> Nombre</th>
                                <th style="color:#fff;">Tipo</th>
                                <th style="color:#fff;">Servicio </th>
                                @can('habilitar-redsocial')
                                <th style="color:#fff;">Estado</th>
                                @endcan
                                <th style="color:#fff;">Acciones</th>
                                <th></th>

                            </thead>
                            <tbody>
                                @can('borrar-usuario')
                                @foreach ($galerias as $galeria)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $galeria->nombreRS }}</td>
                                    <td>{{ $galeria->tipoRS }}</td>
                                    <td>{{ $galeria->Servicio->nombreS }}</td>
                                    @can('habilitar-redsocial')
                                    @if ($galeria->estado == false)
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('redsocials.estado', $galeria->id) }}">Inactivo</a>
                                        </td>
                                    @endif
                                    @if ($galeria->estado == true)
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('redsocials.estado', $galeria->id) }}">Activo</a>

                                        </td>
                                    @endif
                                    @endcan
                                    <td>
                                        <form action="{{ route('redsocials.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('redsocials.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-redsocial')
                                            <a class="btn btn-sm btn-success" href="{{ route('redsocials.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-redsocial')
                                            <a class="btn btn-sm btn-danger btn-link" href="javascript:void(0)" onclick="confirmarEliminacion({{ $galeria->id }})">
                                                <i class="fa fa-fw fa-trash"></i>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endcan
                                @can('ver-contenido')
                                @if($esTrabajador)
                                @foreach ($galeriaU as $galeria)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $galeria->nombreRS }}</td>
                                    <td>{{ $galeria->tipoRS }}</td>
                                    <td>{{ $galeria->Servicio->nombreS }}</td>
                                    @can('habilitar-redsocial')
                                    @if ($galeria->estado == false)
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('redsocials.estado', $galeria->id) }}">Inactivo</a>
                                        </td>
                                    @endif
                                    @if ($galeria->estado == true)
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('redsocials.estado', $galeria->id) }}">Activo</a>

                                        </td>
                                    @endif
                                    @endcan
                                    <td>
                                        <form action="{{ route('redsocials.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('redsocials.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-redsocial')
                                            <a class="btn btn-sm btn-success" href="{{ route('redsocials.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-redsocial')
                                            <a class="btn btn-sm btn-danger btn-link" href="javascript:void(0)" onclick="confirmarEliminacion({{ $galeria->id }})">
                                                <i class="fa fa-fw fa-trash"></i>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                @endcan
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $galerias->links() !!}
        </div>
    </div>
    </div>
    @endsection
    <script>
    function confirmarEliminacion(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta imagen?")) {
            document.getElementById('formulario-eliminar-' + id).submit();
        }
    }
</script>