<!-- Primera parte copiada -->
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Listado de Direcciones</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-direccion')
                        <a class="btn btn-warning" href="{{ route('direccions.create') }}">Crear nueva</a>
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
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">No</th>
                                <th style="color:#fff;">Servicio</th>
                                <th style="color:#fff;">Dirección</th>
                                <th style="color:#fff;">Encargado</th>
                                <th style="color:#fff;">Acciones</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @can('borrar-usuario')
                                @foreach ($galerias as $galeria)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $galeria->Servicio->nombreS }}</td>
                                    <td>{{ $galeria->nombreD }}</td>
                                    <td>{{ $galeria->Persona->nombreP}}</td>
                                    <td>
                                        <form action="{{ route('direccions.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('direccions.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-direccion')
                                            <a class="btn btn-sm btn-success" href="{{ route('direccions.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-direccion')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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
                                    <td>{{ $galeria->Servicio->nombreS }}</td>
                                    <td>{{ $galeria->nombreD }}</td>
                                    <td>{{ $galeria->Persona->nombreP}}</td>
                                    <td>
                                        <form action="{{ route('direccions.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('direccions.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-direccion')
                                            <a class="btn btn-sm btn-success" href="{{ route('direccions.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-direccion')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado!',
            'La dirección se eliminó correctamente.',
            'success'
        )
    </script>
    @endif


    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Usted se encuentra a punto de borrar una dirección',
                text: "¿Está seguro de eliminar esta dirección?",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
    @endsection